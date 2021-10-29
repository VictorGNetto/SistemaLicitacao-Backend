<?php

require_once "db-config.php";

$authorID = $_GET["autorID"];

$documentList = array();

try {
    $sql = "SELECT documentoID, identificacao FROM documentos WHERE autorID = '" . $authorID . "'";
    $result = $conn->query($sql);
    $documentList = $result->fetchAll();

} catch (PDOException $e) {
    die ("ERROR: Could not able to execute $sql. " . $e->getMessage()); 
}

unset($conn);

echo json_encode(["listaDocumentos" => $documentList]);
