<?php

require_once "db-config.php";

// Obtém o conteúdo da requisição HTTP POST
$requestBody = file_get_contents('php://input');
$requestBodyData = json_decode($requestBody);

$documentID = $requestBodyData->documentoID;
$data = $requestBodyData->dados;

try {
    $sql = "UPDATE correcoes SET dados = :dados WHERE documentoID = :documentoID";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(":documentoID", $documentID, PDO::PARAM_STR);
    $stmt->bindParam(":dados", $data, PDO::PARAM_STR);

    $stmt->execute();
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

unset($conn);