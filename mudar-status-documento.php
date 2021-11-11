<?php

require_once "db-config.php";

$documentID = $_GET["documentoID"];
$status = $_GET["status"];

try {
    $sql = "UPDATE documentos SET status = '" . $status . "' WHERE documentoID = '" . $documentID . "'";
    $conn->exec($sql);
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

unset($conn);

echo json_encode(["status" => $status]);