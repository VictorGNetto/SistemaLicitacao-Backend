<?php

/**
 * - Recebe o ID de um Documento Base via GET
 * - Consulta o esse Documento Base no banco de dados
 * - Retorna o ID, Nome e Seções do Documento Base
 */

require_once "db-config.php";

$baseDocumentID = $_GET["documentoBaseID"];

$baseDocumentName = "";
$sections = [];

try {
    $sql = "SELECT identificacaoDocumentoBase, tituloDocumento, secoes FROM documentos_base WHERE documentoBaseID = '" . $baseDocumentID . "'";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $baseDocumentIdentification = $row["identificacaoDocumentoBase"];
    $documentoTitle = $row["tituloDocumento"];
    $sections = json_decode($row["secoes"]);
    
} catch (PDOException $e) {
    die ("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

unset($conn);

$documentoBase = [
    "documentoBaseID" => $baseDocumentID,
    "identificacaoDocumentoBase" => $baseDocumentIdentification,
    "tituloDocumento" => $documentoTitle,
    "secoes" => $sections
];

echo json_encode(["documentoBase" => $documentoBase]);
