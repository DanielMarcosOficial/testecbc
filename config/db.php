<?php

$host = 'localhost';
$dbname = 'cbc';
$username = '';
$password = '';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    http_response_code(500);
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Erro na conexão com o banco de dados']);
    exit();
}
