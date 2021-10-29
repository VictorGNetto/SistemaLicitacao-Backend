<?php

/**
 * Por hora, simplesmente retorna o ID e o nome dos Documentos Base criados
 */

require_once "db-config.php";

$baseDocumentList = array();

try {
    $sql = "SELECT documentoBaseID, nomeDocumentoBase FROM documentos_base";
    $result = $conn->query($sql);
    $baseDocumentList = $result->fetchAll();
} catch (PDOException $e) {
    die ("ERROR: Could not able to execute $sql. " . $e->getMessage()); 
}

unset($conn);

echo json_encode(["listaDocumentosBase" => $baseDocumentList]);
