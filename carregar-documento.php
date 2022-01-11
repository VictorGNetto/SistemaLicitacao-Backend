<?php

require_once "db-config.php";

$documentID = $_GET["documentoID"];
$authorID = "";
$baseDocumentID = "";
$status = "";
$identification = "";
$documentTitle = "";
$sections = [];

try {
    $sql =  "SELECT autorID, documentoBaseID, status, identificacao, tituloDocumento, secoes
            FROM documentos
            WHERE documentoID = '" . $documentID . "'";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $authorID = $row["autorID"];
    $baseDocumentID = $row["documentoBaseID"];
    $status = $row["status"];
    $identification = $row["identificacao"];
    $documentTitle = $row["tituloDocumento"];
    $sections = json_decode($row["secoes"]);

} catch (PDOException $e) {
    die ("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

unset($conn);

$document = [
    "documentoID" => $documentID,
    "autorID" => $authorID,
    "documentoBaseID" => $baseDocumentID,
    "status" => $status,
    "identificacao" => $identification,
    "tituloDocumento" => $documentTitle,
    "secoes" => $sections
];

echo json_encode(["documento" => $document]);