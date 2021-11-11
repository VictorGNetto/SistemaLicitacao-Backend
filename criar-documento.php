<?php

require_once "id-generator.php";
require_once "db-config.php";
require_once "utils.php";

date_default_timezone_set("America/Sao_Paulo");

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

$documentID = "";
$authorID = $_GET["autorID"];
$baseDocumentID = $_GET["documentoBaseID"];
$status = "Em Edição";
$identification = "";
$documentName = "";
$sections = "";
$creation = date("Y-m-d H:i:s");
$edition = date("Y-m-d H:i:s");

$documentID = n_letters_id(5);

// Encontra um ID ainda não usado
while (true) {
    try {
        $sql = "SELECT * FROM documentos WHERE documentoID = '" . $documentID . "'";
        $result = $conn->query($sql);
        if ($result->rowCount() === 0) break;
        $documentID = n_letters_id(5);
    } catch (PDOException $e) {
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
}

// Clona os dados do Documento Base para o novo Documento
try {
    $sql = "SELECT nomeDocumentoBase, secoes FROM documentos_base WHERE documentoBaseID = '" . $baseDocumentID . "'";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $identification = $row["nomeDocumentoBase"] . "-" . strtoupper($documentID);
    $documentName = $row["nomeDocumentoBase"];
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
    $sql = "INSERT INTO documentos
            (documentoID, autorID, documentoBaseID, status,
            identificacao, nomeDocumento, secoes,
            criacao, edicao) VALUES ('" .
            $documentID . "', '" .
            $authorID . "', '" .
            $baseDocumentID . "', '" .
            $status . "', '" .
            $identification . "', '" .
            $documentName . "', '" .
            $sections . "', '" .
            $creation . "', '" .
            $edition . "')";
    
    $conn->exec($sql);
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

unset($conn);

echo json_encode(["documentoID" => $documentID]);
