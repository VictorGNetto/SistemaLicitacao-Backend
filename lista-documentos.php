<?php

require_once "db-config.php";

$documentList = array();

try {
    if (isset($_GET["autorID"])) {
        $sql = "SELECT documentoID, identificacao, status, criacao, edicao FROM documentos WHERE autorID = '" . $_GET["autorID"] . "' ORDER BY edicao DESC";
        $result = $conn->query($sql);
        $documentList = $result->fetchAll();
    } else if (isset($_GET["status"])) {
        $sql = "SELECT documentoID, identificacao, status, criacao, edicao FROM documentos WHERE status = '" . $_GET["status"] . "' ORDER BY edicao DESC";
        $result = $conn->query($sql);
        $documentList = $result->fetchAll();
    }
} catch (PDOException $e) {
    die ("ERROR: Could not able to execute $sql. " . $e->getMessage()); 
}

// Altera o formato dos campos de criacao e edicao
$documentListLength = count($documentList);
for ($i = 0; $i < $documentListLength; $i++) {
    $newCreation = date_create_from_format("Y-m-d H:i:s", $documentList[$i]["criacao"]);
    $documentList[$i]["criacao"] = date_format($newCreation, "d/m/Y");

    $newEdition = date_create_from_format("Y-m-d H:i:s", $documentList[$i]["edicao"]);
    $documentList[$i]["edicao"] = date_format($newEdition, "d/m/Y - H:i");
}

unset($conn);

echo json_encode(["listaDocumentos" => $documentList]);
