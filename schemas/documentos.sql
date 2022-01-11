CREATE TABLE `documentos` (
  `documentoID` char(5) NOT NULL,
  `autorID` int NOT NULL,
  `documentoBaseID` char(3) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `identificacao` varchar(500) DEFAULT NULL,
  `tituloDocumento` varchar(500) DEFAULT NULL,
  `secoes` varchar(10000) DEFAULT NULL,
  `criacao` TIMESTAMP,
  `edicao` TIMESTAMP
);

ALTER TABLE `documentos`
  ADD PRIMARY KEY (`documentoID`);
COMMIT;