<?php

require_once "id-generator.php";
require_once "db-config.php";

$baseDocumentID = n_letters_id(3);

$sql = "INSERT INTO documentos_base (documentoBaseID, nomeDocumentoBase, secoes) VALUES (?, ?, ?)";

if ($stmt = mysqli_prepare($link, $sql)) {
    mysqli_stmt_bind_param($stmt, "sss", $param_baseDocumentID, $param_baseDocumentName, $param_sections);
    $param_baseDocumentID = $baseDocumentID;
    $param_baseDocumentName = "Documento Base Novo";
    $param_sections = '[{"nome":"1ª Seção","itens":[]}]';

    mysqli_stmt_execute($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($link);

echo json_encode(["documentoBaseID" => $baseDocumentID]);
