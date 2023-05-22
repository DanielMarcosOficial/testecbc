<?php

require_once('models/Clube.php');

class ClubesController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function listarTodosClubes()
    {
        try {
            // Chamada da funcao listarClubes do Model Clube para a listagem de todos os clubes cadastrados no banco de dados
            $clube = new Clube();
            $clube = $clube->listarClubes();

            // Resposta da requisicao com todos os clubes cadastrados no sistema em formato Json
            http_response_code(200);
            header('Content-Type: application/json');
            echo json_encode($clube);
        } catch (PDOException $e) {
            // Tratar exceções de banco de dados
            http_response_code(500);
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Erro ao listar todos os clubes']);
        }
    }

    public function cadastrarClube()
    {
        try {
            // Obtém os dados enviados no corpo da requisição
            $requestData = json_decode(file_get_contents('php://input'), true);

            // Verifica se os parâmetros esperados estão presentes
            if (isset($requestData['clube']) && isset($requestData['saldo_disponivel'])) {
                $nome_clube = $requestData['clube'];
                $saldo_disponivel = $requestData['saldo_disponivel'];

                // Chamada da funcao cadastrarClube do Model Clube para enviar os dados para cadastro de novo Clube e seu saldo respectivo
                $clube = new Clube();
                $clube->cadastrarClube($nome_clube, $saldo_disponivel);

                // Resposta 'ok' para quando um clube é cadastrado com sucesso 
                $response = 'ok';
                http_response_code(200);
                header('Content-Type: application/json');
                // Retorna a resposta em formato JSON
                echo json_encode($response);
            } else {
                // Parâmetros vazios ou incorretos
                throw new Exception('Parâmetros inválidos');
            }
        } catch (Exception $e) {
            // Tratar exceções de requisicao
            $response = [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
            // Define o código de status HTTP para 400 (Bad Request)
            http_response_code(400);
            // Retorna a resposta em formato JSON
            echo json_encode($response);
        }
    }
}
