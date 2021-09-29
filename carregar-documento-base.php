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
                    ["tipo" => "nota", "itemID" => 'nota-001'],
                    ["tipo" => "texto", "itemID" => 'fds-erqa-wer'],
                    ["tipo" => "opcoes", "itemID" => 'qio-abeq-qqa'],
                    ["tipo" => "nota", "itemID" => 'nota-002']
                ]
            ],
            [
                "nome" => "Justificativa",
                "itens" => [
                    ["tipo" => "nota", "itemID" => 'nota-003'],
                    ["tipo" => "nota", "itemID" => 'nota-004']
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
                    ["tipo" => "nota", "itemID" => 'nota-005'],
                    ["tipo" => "texto", "itemID" => 'abc-erqa-wer'],
                    ["tipo" => "opcoes", "itemID" => 'abc-abeq-qqa']
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
                    ["tipo" => "nota", "itemID" => 'nota-006']
                ]
            ],
            [
                "nome" => "Justificativa",
                "itens" => [
                    ["tipo" => "nota", "itemID" => 'nota-007'],
                    ["tipo" => "nota", "itemID" => 'nota-008']
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
