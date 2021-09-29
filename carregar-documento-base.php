<?php

$documentoBaseID = $_GET["documentoBaseID"];

$documentoBase = [];

if ($documentoBaseID === "DocB-0001") {
    // Termo de Referência - Compra Direta
    $documentoBase = [
        "nomeDocumentoBase" => "Termo de Referência - Compra Direta",
        "secoes" => [
            [
                "nome" => "Objeto",
                "itens" => [
                    ["tipo" => "nota", "id" => 'ahs-yeua-ajt'],
                    ["tipo" => "texto", "id" => 'fds-erqa-wer'],
                    ["tipo" => "opcoes", "id" => 'qio-abeq-qqa'],
                    ["tipo" => "nota", "id" => 'uie-qjfd-asd']
                ]
            ],
            [
                "nome" => "Justificativa",
                "itens" => [
                    ["tipo" => "nota", "id" => 'adf-qerq-mjj'],
                    ["tipo" => "nota", "id" => 'fda-feqa-qer']
                ]
            ]
        ]
    ];
} else if ($documentoBaseID === "DocB-0002") {
    // Estudo Técnico Preliminar - Licitação
    $documentoBase = [
        "nomeDocumentoBase" => "Estudo Técnico Preliminar - Licitação",
        "secoes" => [
            [
                "nome" => "Objeto",
                "itens" => [
                    ["tipo" => "nota", "id" => 'ahs-yeua-ajt'],
                    ["tipo" => "texto", "id" => 'fds-erqa-wer'],
                    ["tipo" => "opcoes", "id" => 'qio-abeq-qqa']
                ]
            ]
        ]
    ];
} else if ($documentoBaseID === "DocB-0003") {
    // Termo de Referência - Licitação
    $documentoBase = [
        "nomeDocumentoBase" => "Termo de Referência - Licitação",
        "secoes" => [
            [
                "nome" => "Objeto",
                "itens" => [
                    ["tipo" => "nota", "id" => 'ahs-yeua-ajt']
                ]
            ],
            [
                "nome" => "Justificativa",
                "itens" => [
                    ["tipo" => "nota", "id" => 'adf-qerq-mjj'],
                    ["tipo" => "nota", "id" => 'fda-feqa-qer']
                ]
            ]
        ]
    ];
} else {
    // Documento Base vazio
    $documentoBase = [
        "nomeDocumentoBase" => "",
        "secoes" => [
            [
                "nome" => "1ª Seção",
                "itens" => []
            ]
        ]
    ];
}

echo json_encode(["documentoBase" => $documentoBase]);
