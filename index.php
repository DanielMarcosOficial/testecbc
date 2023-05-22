<?php

require_once('controllers/ClubesController.php');
require_once('controllers/RecursosController.php');

// Nova instância do controlador de clubes
$clubesController = new ClubesController();
$recursosController = new RecursosController();

// Verifica qual função esá sendo chamada
$chamada = explode("/", $_SERVER['REQUEST_URI']);
// Verifica o método da requisição
$method = $_SERVER['REQUEST_METHOD'];

// Roteamento de acordo com o método e o endpoint
if ($method == 'GET') {
    // Rota para listar todos os clubes
    if ($chamada[2] == 'listarTodosClubes') {
        $clubesController->listarTodosClubes();
    }

    if ($chamada[2] == '') {
        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode(['success' => 'Instalação feita com sucesso, volte no git para entender como usar as funções']);
        exit();
    }
} elseif ($method == 'POST') {
    // Rota para cadastrar um novo clube
    if ($chamada[2] == 'cadastrarClube') {
        $clubesController->cadastrarClube();
    }
    if ($chamada[2] == 'consumirRecursos') {
        $recursosController->consumirRecursos();
    }
} else {
    // Responde com código de status 405 (Método não permitido) para outros métodos HTTP
    http_response_code(405);
}
