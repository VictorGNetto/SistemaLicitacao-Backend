<?php

require_once "db-config.php";

$sql = "SELECT documentoBaseID, nomeDocumentoBase FROM documentos_base";
$result = mysqli_query($link, $sql);
$baseDocumentList = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($link);

echo json_encode(["listaDocumentosBase" => $baseDocumentList]);
