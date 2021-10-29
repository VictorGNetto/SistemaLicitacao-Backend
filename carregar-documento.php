<?php

require_once "db-config.php";

$documentID = $_GET["documentoID"];
$authorID = "";
$baseDocumentID = "";
$status = "";
$identification = "";
$documentName = "";
$sections = [];

try {
    $sql =  "SELECT autorID, documentoBaseID, status, identificacao, nomeDocumento, secoes
            FROM documentos
            WHERE documentoID = '" . $documentID . "'";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $authorID = $row["autorID"];
    $baseDocumentID = $row["documentoBaseID"];
    $status = $row["status"];
    $identification = $row["identificacao"];
    $documentName = $row["nomeDocumento"];
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
    "nomeDocumento" => $documentName,
    "secoes" => $sections
];

echo json_encode(["documento" => $document]);