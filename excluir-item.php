<?php

/**
 * - Recebe via GET o ID de um Item que deve ser excluído do banco de dados
 * - Remove o Item do banco de dados
 * - Retorna o ID do Item
 */

require_once "db-config.php";

$itemID = $_GET["itemID"];

try {
    $sql = "DELETE FROM itens WHERE itemID = '" . $itemID . "'";
    $conn->exec($sql);

} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

unset($conn);

echo json_encode( ["itemID" =>  $itemID]);