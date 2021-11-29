<?php

require_once "db-config.php";

$documentID = $_GET["documentoID"];
$data = '{"listaCorrecoes":[]}';

try {
    $sql = "INSERT INTO correcoes (documentoID, dados) VALUES ('" . $documentID . "', '" . $data . "')";

    $conn->exec($sql);
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

unset($conn);
