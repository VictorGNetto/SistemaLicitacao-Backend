<?php

require_once "id-generator.php";
require_once "db-config.php";
require_once "utils.php";

function clone_item($itemID, $conn) {
    $newItemID = get_unused_itemID($conn);

    try {
        $sql = "SELECT dados FROM itens WHERE itemID = '" . $itemID . "'";
        $result = $conn->query($sql);
        $row = $result->fetch();
        $data = $row["dados"];
    } catch (PDOException $e) {
        die ("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }

    try {
        // Prepara a declaração
        $sql = "INSERT INTO itens (itemID, dados) VALUES (:itemID, :dados)";
        $stmt = $conn->prepare($sql);

        // Vincula parâmetros à declaração
        $stmt->bindParam(":itemID", $newItemID, PDO::PARAM_STR);
        $stmt->bindParam(":dados", $data, PDO::PARAM_STR);

        $stmt->execute();
    } catch (PDOException $e) {
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }

    return $newItemID;
}

$baseDocumentID = $_GET["documentoBaseID"];  // ID do Documento Base original

$newBaseDocumentID = n_letters_id(3);        // ID do nono Documento Base
$baseDocumentIdentification = "";
$documentTitle = "";
$sections = "";

// Encontra um ID ainda não usado para o Documento Base
while (true) {
    try {
        $sql = "SELECT * FROM documentos_base WHERE documentoBaseID = '" . $newBaseDocumentID . "'";
        $result = $conn->query($sql);
        if ($result->rowCount() === 0) break;
        $newBaseDocumentID = n_letters_id(3);
    } catch (PDOException $e) {
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
}

// Clona os dados do Documento Base para o novo Documento Base
try {
    $sql = "SELECT identificacaoDocumentoBase, tituloDocumento, secoes FROM documentos_base WHERE documentoBaseID = '" . $baseDocumentID . "'";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $baseDocumentIdentification = $row["identificacaoDocumentoBase"] . " [Cópia]";
    $documentTitle = $row["tituloDocumento"];
    $sections = json_decode($row["secoes"]);
    
    foreach ($sections as $section) {
        $items = $section->itens;
        foreach ($items as $item) {
            $newItemID = clone_item($item->itemID, $conn);
            $item->itemID = $newItemID;
        }
    }

    $sections = json_encode($sections, JSON_UNESCAPED_UNICODE);
} catch (PDOException $e) {
    die ("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

try {
    $sql = "INSERT INTO documentos_base (documentoBaseID, identificacaoDocumentoBase, tituloDocumento, secoes) VALUES ('" .
            $newBaseDocumentID . "', '" .
            $baseDocumentIdentification . "', '" .
            $documentTitle . "', '" .
            $sections . "')";
    
    $conn->exec($sql);
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

unset($conn);

echo json_encode(["documentoBaseID" => $newBaseDocumentID]);