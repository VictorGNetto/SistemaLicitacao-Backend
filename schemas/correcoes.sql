CREATE TABLE `correcoes` (
  `documentoID` char(5) NOT NULL,
  `dados` varchar(10000) DEFAULT NULL
);

ALTER TABLE `correcoes`
  ADD PRIMARY KEY (`documentoID`);
COMMIT;

ALTER TABLE `correcoes`
  ADD FOREIGN KEY (`documentoID`) REFERENCES `documentos`(`documentoID`) ON DELETE CASCADE;
COMMIT;
