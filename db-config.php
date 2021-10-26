<?php

/**
 * Arquivo de configuração de acesso ao Banco de Dados
 */

// Alterar essa variável para true quando estiver em produção
$production = false;

if ($production) {
    define('DB_SERVER', '10.6.56.200');
    define('DB_USERNAME', 'licitacao');
    define('DB_PASSWORD', 'Licitacao@2021');
    define('DB_NAME', 'db_licitacao');
} else {
    define('DB_SERVER', '10.6.56.200');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'Abc@2021');
    define('DB_NAME', 'db_licitacao');
}

try {
    $conn = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $conn->setAttribute(pdo::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die ("ERROR: Could not connect. " . $e->getMessage());
}
