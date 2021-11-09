<?php

require_once "db-config.php";

$userID = $_GET["usuarioID"];

$baseDocumentCriation = false;
$documentAnalysis = false;

try {
    $sql = "SELECT criacaoDocumentoBase, realizacaoAnalise FROM permissoes WHERE usuarioID = '" . $userID . "'";
    $resut = $conn->query($sql);
    if ($resut->rowCount() > 0) {
        $row = $resut->fetch();
        
        if ($row["criacaoDocumentoBase"] !== "0") {
            $baseDocumentCriation = true;
        }

        if ($row["realizacaoAnalise"] !== "0") {
            $documentAnalysis = true;
        }
    }
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

echo json_encode(["criacaoDocumentoBase" => $baseDocumentCriation, "realizacaoAnalise" => $documentAnalysis]);
