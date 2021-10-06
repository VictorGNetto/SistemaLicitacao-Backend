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