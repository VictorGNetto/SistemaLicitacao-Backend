<?php

require_once "id-generator.php";

function get_unused_itemID($conn) {
    // 26^6 ~ 300M IDs
    $itemID = n_letters_id(6);

    while (true) {
        try {
            $sql = "SELECT * FROM itens WHERE itemID = '" . $itemID . "'";
            $result = $conn->query($sql);
            if ($result->rowCount() === 0) break;
            $itemID = n_letters_id(6);
        } catch (PDOException $e) {
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }
    }

    return $itemID;
}