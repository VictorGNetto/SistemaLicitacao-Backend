<?php

$listaDocumentosBase = [
    ["documentoBaseID" => "auj", "nomeDocumentoBase" => "Termo de Referência - Compra Direta"],
    ["documentoBaseID" => "iko", "nomeDocumentoBase" => "Estudo Técnico Preliminar - Licitação"],
    ["documentoBaseID" => "qoi", "nomeDocumentoBase" => "Termo de Referência - Licitação"],
];

echo json_encode(["listaDocumentosBase" => $listaDocumentosBase]);
