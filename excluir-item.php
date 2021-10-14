<?php

require_once "db-config.php";

$itemID = $_GET["itemID"];

$sql = "DELETE FROM itens WHERE itemID = '" . $itemID . "'";
mysqli_query($link, $sql);
mysqli_close($link);

echo json_encode( ["itemID" =>  $itemID]);