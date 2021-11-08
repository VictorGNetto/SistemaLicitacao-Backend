<?php

require_once "db-config.php";

function delete_item($itemID, $conn) {
    try {
        $sql = "DELETE FROM itens WHERE itemID = '" . $itemID . "'";
        $conn->exec($sql);
    } catch (PDOException $e) {
        die ("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
}

$documentID = $_GET["documentoID"];

// Exclui todos os itens do Documento Base
try {
    $sql = "SELECT secoes FROM documentos WHERE documentoID = '" . $documentID . "'";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $sections = json_decode($row["secoes"]);

    foreach ($sections as $section) {
        $items = $section->itens;
        foreach ($items as $item) {
            delete_item($item->itemID, $conn);
        }
    }
} catch (PDOException $e) {
    die ("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

// Exclui o Documento Base em si
try {
    $sql = "DELETE FROM documentos WHERE documentoID = '" . $documentID . "'";
    $conn->exec($sql);
} catch (PDOException $e) {
    die ("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

unset($conn);

echo json_encode( ["documentoID" =>  $documentID]);