<?php

/**
 * - Recebe uma requisição POST com os dados de um Documento Base
 *   para serem salvos
 * - Salva esses dados no banco de dados
 */

require_once "db-config.php";

// Obtém o conteúdo da requisição HTTP POST
$requestBody = file_get_contents('php://input');
$requestBodyData = json_decode($requestBody);

$baseDocumentID = $requestBodyData->documentoBaseID;
$baseDocumentName = $requestBodyData->nomeDocumentoBase;
$sections = json_encode($requestBodyData->secoes, JSON_UNESCAPED_UNICODE);

try {
    $sql = "UPDATE documentos_base SET nomedocumentoBase = '" . $baseDocumentName .
            "', secoes = '" . $sections .
            "' WHERE documentoBaseID = '" . $baseDocumentID . "'";
    $conn->exec($sql);
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

unset($conn);
