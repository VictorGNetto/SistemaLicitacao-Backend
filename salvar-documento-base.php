<?php

require_once "db-config.php";

// Obtém o conteúdo da requisição HTTP POST
$requestBody = file_get_contents('php://input');
$requestBodyData = json_decode($requestBody);

$baseDocumentID = $requestBodyData->documentoBaseID;
$baseDocumentName = $requestBodyData->nomeDocumentoBase;
$sections = json_encode($requestBodyData->secoes);

$sql = "UPDATE documentos_base SET nomeDocumentoBase=?, secoes=? WHERE documentoBaseID=?";

if ($stmt = mysqli_prepare($link, $sql)) {
    mysqli_stmt_bind_param($stmt, "sss", $param_baseDocumentName, $param_sections, $param_baseDocumentID);
    $param_baseDocumentName = $baseDocumentName;
    $param_sections = $sections;
    $param_baseDocumentID = $baseDocumentID;

    mysqli_stmt_execute($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($link);