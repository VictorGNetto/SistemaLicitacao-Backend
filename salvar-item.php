<?php

/**
 * - Recebe o ID de um item para ser salvado via GET
 * - Se o ID for de um item novo (começado com 'item novo'),
 *   encontra um ID ainda não usado no banco de dados
 * - Salva os dados do Item no banco de dados
 * - Retorna o ID do Item salvado
 */

require_once "db-config.php";
require_once "id-generator.php";
require_once "utils.php";

// Obtém o conteúdo da requisição HTTP POST
$requestBody = file_get_contents('php://input');
$requestBodyData = json_decode($requestBody);

$itemID = $requestBodyData->itemID;
$data = $requestBodyData->dados;
$itemIsNew = $requestBodyData->novo;

if ($itemIsNew) {
    $itemID = get_unused_itemID($conn);

    try {
        // Prepara a declaração
        $sql = "INSERT INTO itens (itemID, dados) VALUES (:itemID, :dados)";
        $stmt = $conn->prepare($sql);

        // Vincula parâmetros à declaração
        $stmt->bindParam(":itemID", $itemID, PDO::PARAM_STR);
        $stmt->bindParam(":dados", $data, PDO::PARAM_STR);

        $stmt->execute();
    } catch (PDOException $e) {
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
} else {
    try {
        // Prepara a declaração
        $sql = "UPDATE itens SET dados = :dados WHERE itemID = :itemID";
        $stmt = $conn->prepare($sql);

        // Vincula parâmetros à declaração
        $stmt->bindParam(":itemID", $itemID, PDO::PARAM_STR);
        $stmt->bindParam(":dados", $data, PDO::PARAM_STR);

        $stmt->execute();
    } catch (PDOException) {
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
}

unset($conn);

echo json_encode( ["itemID" =>  $itemID]);