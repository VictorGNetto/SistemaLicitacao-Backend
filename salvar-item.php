<?php

require_once "db-config.php";
require_once "id-generator.php";

// - Obtém um ID aleatório
// - Verifica se esse ID está no Banco de Dados
// - Se sim, repete o processo; Se não, retorna o ID obtido
function getUnusedItemID()
{
    return n_letters_id(6);
}

// Obtém o conteúdo da requisição HTTP POST
$requestBody = file_get_contents('php://input');
$requestBodyData = json_decode($requestBody);

$itemID = $requestBodyData->itemID;
$data = $requestBodyData->dados;

// Verifica se o item precisa ser salvo ou atualizado
$itemIsNew = str_starts_with($itemID, "item novo");

if ($itemIsNew) {
    $itemID = getUnusedItemID();

    $sql = "INSERT INTO itens (itemID, dados) VALUES (?, ?)";
    
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "ss", $param_itemID, $param_data);
        $param_itemID = $itemID;
        $param_data = $data;

        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
} else {
    $sql = "UPDATE itens SET dados=? WHERE itemID=?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "ss", $param_data, $param_itemID);
        $param_data = $data;
        $param_itemID = $itemID;

        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($link);

echo json_encode( ["itemID" =>  $itemID]);