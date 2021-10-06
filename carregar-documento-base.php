<?php

require_once "db-config.php";

$baseDocumentID = $_GET["documentoBaseID"];

$sql = "SELECT nomeDocumentoBase, secoes FROM documentos_base WHERE documentoBaseID = ?";

$baseDocumentName = "";
$sections = [];
if ($stmt = mysqli_prepare($link, $sql)) {
    mysqli_stmt_bind_param($stmt, "s", $param_baseDocumentID);
    $param_baseDocumentID = $baseDocumentID;

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $baseDocumentName = $row["nomeDocumentoBase"];
    $sections = json_decode($row["secoes"]);
}

$documentoBase = [
    "documentoBaseID" => $baseDocumentID,
    "nomeDocumentoBase" => $baseDocumentName,
    "secoes" => $sections
];

echo json_encode(["documentoBase" => $documentoBase]);
