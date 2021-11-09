CREATE TABLE `permissoes` (
    `usuarioID` int NOT NULL,
    `criacaoDocumentoBase` boolean,
    `realizacaoAnalise` boolean
);

ALTER TABLE `permissoes`
  ADD PRIMARY KEY (`usuarioID`);
COMMIT;