<?php

/**
 * - Recebe o ID de um Item
 * - Consulta o esse Item no banco de dados
 * - Retorna o ID e os dados do Item
 */

require_once "db-config.php";

$itemID = $_GET["itemID"];

$data = "";

try {
    $sql = "SELECT dados FROM itens WHERE itemID = '" . $itemID . "'";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $data = $row["dados"];
} catch (PDOException $e) {
    die ("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

unset($conn);

echo json_encode(["itemID" => $itemID, "dados" => $data]);