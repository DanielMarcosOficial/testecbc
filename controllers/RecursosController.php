<?php

require_once('models/Clube.php');
require_once('models/Recurso.php');

class RecursosController
{


    public function consumirRecursos()
    {
        //recebo a requisicao
        $requestData = json_decode(file_get_contents('php://input'), true);
        if (isset($requestData['clube_id']) && isset($requestData['valor_consumo']) && isset($requestData['recurso_id'])) {
            $clube_id = $requestData['clube_id'];
            $valor_consumo = $requestData['valor_consumo'];
            $recurso_id = $requestData['recurso_id'];

            //verificando se o recurso do clube é suficiente 
            $instanciaClube = new Clube();
            $clube = $instanciaClube->verificaSaldoClube($clube_id, $valor_consumo);
            if ($clube) {
                //verificando se o CBC tem recurso suficiente para o clube
                $instanciaRecurso = new Recurso();
                $recurso = $instanciaRecurso->verificaSaldoRecurso($recurso_id, $valor_consumo);
                if ($recurso) {
                    //guardando saldo anterior
                    $saldo_anterior = $clube->saldo_disponivel;

                    //consumir recurso do clube e dos CBC
                    $consumirRecursosClube = $instanciaClube->consumirRecursosClube($clube_id, $valor_consumo);
                    $consumirRecursosCBC = $instanciaRecurso->consumirRecursos($recurso_id, $valor_consumo);


                    // Retornando Json com as infomacoes do clube como saldo anterior e saldo atual
                    $consumo =
                        array(
                            'clube' => $clube->nome_clube,
                            'saldo_anterior' => $saldo_anterior,
                            'saldo_atual' => $consumirRecursosClube->saldo_disponivel
                        );

                    $consumo = json_encode($consumo);
                    echo $consumo;
                } else {
                    http_response_code(400);
                    header('Content-Type: application/json');
                    echo json_encode('O saldo disponível do recurso é insuficiente.');
                }
            } else {
                http_response_code(400);
                header('Content-Type: application/json');
                echo json_encode('O saldo disponível do clube é insuficiente.');
            }
        } else {
            http_response_code(400);
            header('Content-Type: application/json');
            echo json_encode('Parâmetros inválidos');
        }
    }
}
