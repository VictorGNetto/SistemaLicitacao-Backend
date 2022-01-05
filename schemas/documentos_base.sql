CREATE TABLE `documentos_base` (
  `documentoBaseID` char(3) NOT NULL,
  `identificacaoDocumentoBase` varchar(500) DEFAULT NULL,
  `tituloDocumento` varchar(500) DEFAULT NULL,
  `secoes` varchar(10000) DEFAULT NULL
);

-- INSERT INTO `documentos_base` (`documentoBaseID`, `nomeDocumentoBase`, `secoes`) VALUES
-- ('auj', 'Termo de Referência - Compra Direta', '[{\"nome\":\"OBJETO\",\"itens\":[{\"tipo\":\"nota\",\"itemID\":\"obolxf\"},{\"tipo\":\"texto\",\"itemID\":\"zrlsuw\"},{\"tipo\":\"nota\",\"itemID\":\"fondur\"},{\"tipo\":\"opcoes\",\"itemID\":\"dzdrpe\"},{\"tipo\":\"opcoes\",\"itemID\":\"plywcb\"},{\"tipo\":\"opcoes\",\"itemID\":\"ihxwja\"},{\"tipo\":\"nota\",\"itemID\":\"qxajlk\"},{\"tipo\":\"opcoes\",\"itemID\":\"dujpsw\"},{\"tipo\":\"opcoes\",\"itemID\":\"dxivtv\"}]},{\"nome\":\"JUSTIFICATIVA\",\"itens\":[{\"tipo\":\"texto\",\"itemID\":\"gxqopu\"},{\"tipo\":\"nota\",\"itemID\":\"wfkryj\"}]},{\"nome\":\"ESPECIFICA\\u00c7\\u00d5ES T\\u00c9CNICAS\",\"itens\":[{\"tipo\":\"texto\",\"itemID\":\"asknhw\"},{\"tipo\":\"nota\",\"itemID\":\"slznpt\"}]},{\"nome\":\"QUALIFICA\\u00c7\\u00c3O T\\u00c9CNICA\",\"itens\":[{\"tipo\":\"texto\",\"itemID\":\"okxxzl\"},{\"tipo\":\"texto\",\"itemID\":\"qodepw\"},{\"tipo\":\"texto\",\"itemID\":\"dzvfek\"}]}]'),
-- ('fan', 'Termo de Referência - Licitação', '[{\"nome\":\"Justificativa\",\"itens\":[]}]'),
-- ('gmk', 'Documento Base Novo', '[{\"nome\":\"2\\u00aa Se\\u00e7\\u00e3o\",\"itens\":[]}]'),
-- ('umu', 'Apenas mais um Documento', '[{\"nome\":\"1\\u00aa Se\\u00e7\\u00e3o\",\"itens\":[]}]');

ALTER TABLE `documentos_base`
  ADD PRIMARY KEY (`documentoBaseID`);
COMMIT;