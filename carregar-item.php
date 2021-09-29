<?php

$itemID = $_GET["itemID"];

$item = [];

if ($itemID === "nota-001") {
    $item = [
        "conteudo" => "Texto da 1ª Nota",
        "nivelIndentacao" => 0
    ];
} else if ($itemID === "nota-002") {
    $item = [
        "conteudo" => "Texto da 2ª Nota",
        "nivelIndentacao" => 1
    ];
} else if ($itemID === "nota-003") {
    $item = [
        "conteudo" => "Texto da 3ª Nota",
        "nivelIndentacao" => 2
    ];
} else if ($itemID === "nota-004") {
    $item = [
        "conteudo" => "Texto da 4ª Nota",
        "nivelIndentacao" => 0
    ];
} else if ($itemID === "nota-005") {
    $item = [
        "conteudo" => "Texto da 5ª Nota",
        "nivelIndentacao" => 1
    ];
} else if ($itemID === "nota-006") {
    $item = [
        "conteudo" => "Texto da 6ª Nota",
        "nivelIndentacao" => 2
    ];
} else if ($itemID === "nota-007") {
    $item = [
        "conteudo" => "Texto da 7ª Nota",
        "nivelIndentacao" => 0
    ];
} else if ($itemID === "nota-008") {
    $item = [
        "conteudo" => "Texto da 8ª Nota",
        "nivelIndentacao" => 1
    ];
} 

echo json_encode(["item" => $item]);