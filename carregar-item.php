<?php

require_once "db-config.php";

$itemID = $_GET["itemID"];

$data = "";
$sql = "SELECT dados FROM itens WHERE itemID = ?";

if ($stmt = mysqli_prepare($link, $sql)) {
    mysqli_stmt_bind_param($stmt, "s", $param_itemID);
    $param_itemID = $itemID;
    
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        
        $data = $row["dados"];
    }
}

mysqli_stmt_close($stmt);
mysqli_close($link);

echo json_encode(["itemID" => $itemID, "dados" => $data]);

// $item = [];

// if ($itemID === "nota-001") {
//     $item = [
//         "conteudo" => "Texto da 1ª Nota",
//         "nivelIndentacao" => 0
//     ];
// } else if ($itemID === "nota-002") {
//     $item = [
//         "conteudo" => "Texto da 2ª Nota",
//         "nivelIndentacao" => 1
//     ];
// } else if ($itemID === "nota-003") {
//     $item = [
//         "conteudo" => "Texto da 3ª Nota",
//         "nivelIndentacao" => 2
//     ];
// } else if ($itemID === "nota-004") {
//     $item = [
//         "conteudo" => "Texto da 4ª Nota",
//         "nivelIndentacao" => 0
//     ];
// } else if ($itemID === "nota-005") {
//     $item = [
//         "conteudo" => "Texto da 5ª Nota",
//         "nivelIndentacao" => 1
//     ];
// } else if ($itemID === "nota-006") {
//     $item = [
//         "conteudo" => "Texto da 6ª Nota",
//         "nivelIndentacao" => 2
//     ];
// } else if ($itemID === "nota-007") {
//     $item = [
//         "conteudo" => "Texto da 7ª Nota",
//         "nivelIndentacao" => 0
//     ];
// } else if ($itemID === "nota-008") {
//     $item = [
//         "conteudo" => "Texto da 8ª Nota",
//         "nivelIndentacao" => 1
//     ];
// } 
