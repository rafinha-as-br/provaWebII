<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));

$dotenv->load();


$hostname = $_ENV['DB_HOST'];
$username = $_ENV['DB_USER'];
$password = $_ENV['DB_PASS'];
$database = $_ENV['DB_NAME'];

// Conecta ao banco
$mysqli = new mysqli($hostname, $username, $password, $database);

// Verifica a conexão
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
