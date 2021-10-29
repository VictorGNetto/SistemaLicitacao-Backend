<?php

/**
 * - Recebe uma requisição para criar um Documento Base novo
 * - Encontra um ID ainda não usado por nenhum Documento Base
 * - Usa o ID encontrado e cria um novo Documento Base com
 *   dados (nome, seções) padrões no banco de dados
 * - Retorna o ID do Documento Base criado
 */

require_once "id-generator.php";
require_once "db-config.php";

$baseDocumentID = n_letters_id(3);

// Encontra um ID ainda não usado
while (true) {
    try {
        $sql = "SELECT * FROM documentos_base WHERE documentoBaseID = '" . $baseDocumentID . "'";
        $result = $conn->query($sql);
        if ($result->rowCount() === 0) break;
        $baseDocumentID = n_letters_id(3);
    } catch (PDOException $e) {
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
}

try {
    $baseDocumentName = "Documento Base Novo";
    $sections = '[{"nome":"1ª Seção","itens":[]}]';
    
    $sql = "INSERT INTO documentos_base (documentoBaseID, nomeDocumentoBase, secoes) VALUES ('" .
            $baseDocumentID . "', '" .
            $baseDocumentName . "', '" .
            $sections . "')";
    
    $conn->exec($sql);
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

unset($conn);

echo json_encode(["documentoBaseID" => $baseDocumentID]);
