<?php

require_once "db-config.php";

$documentID = $_GET["documentoID"];
$identification = "";
$status = "";
$creation = "";
$edition = "";


try {
    $sql = "SELECT identificacao, status, criacao, edicao
            FROM documentos
            WHERE documentoID = '" . $documentID . "'";
    $result = $conn->query($sql);
    if ($result->rowCount() === 1) {
        $row = $result->fetch();
        $identification = $row["identificacao"];
        $status = $row["status"];
        $creation = $row["criacao"];
        $edition = $row["edicao"];
    } else {
    }
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

unset($conn);

$document = [
    "documentoID" => $documentID,
    "identificacao" => $identification,
    "status" => $status,
    "criacao" => $creation,
    "edicao" => $edition
];

echo json_encode(["documento" => $document]);
