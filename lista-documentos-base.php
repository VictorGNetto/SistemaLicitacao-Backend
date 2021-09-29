<?php

$listaDocumentosBase = [
    ["documentoBaseID" => "DocB-0001", "nomeDocumentoBase" => "Termo de Referência - Compra Direta"],
    ["documentoBaseID" => "DocB-0002", "nomeDocumentoBase" => "Estudo Técnico Preliminar - Licitação"],
    ["documentoBaseID" => "DocB-0003", "nomeDocumentoBase" => "Termo de Referência - Licitação"],
];

echo json_encode(["listaDocumentosBase" => $listaDocumentosBase]);
