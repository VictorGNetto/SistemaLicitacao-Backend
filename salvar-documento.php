<?php

/**
 * - Recebe uma requisição POST com os dados de um Documento
 *   para serem salvos
 * - Salva esses dados no banco de dados
 */

date_default_timezone_set("America/Sao_Paulo");
$edition = date("Y-m-d H:i:s");

require_once "db-config.php";

// Obtém o conteúdo da requisição HTTP POST
$requestBody = file_get_contents('php://input');
$requestBodyData = json_decode($requestBody);

$documentID = $requestBodyData->documentoID;
$documentName = $requestBodyData->nomeDocumento;
$sections = json_encode($requestBodyData->secoes, JSON_UNESCAPED_UNICODE);

try {
    $sql = "UPDATE documentos SET nomeDocumento = '" . $documentName .
            "', secoes = '" . $sections .
            "', edicao = '" . $edition .
            "' WHERE documentoID = '" . $documentID . "'";
    $conn->exec($sql);
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

unset($conn);
