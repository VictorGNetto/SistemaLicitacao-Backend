<?php

require_once "db-config.php";

$documentID = $_GET["documentoID"];
$data = "";

try {
    $sql = "SELECT dados FROM correcoes WHERE documentoID = '" . $documentID . "'";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $data = $row["dados"];
} catch (PDOException $e) {
    die ("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

unset($conn);

echo json_encode(["documentoID" => $documentID, "dados" => $data]);