<?php
require_once('config/db.php');
class Recurso
{
    public $id;
    public $recurso;
    public $saldo_disponivel;
    private $db;


    public function __construct($id = null, $recurso = null, $saldo_disponivel = null)
    {
        $this->id = $id;
        $this->recurso = $recurso;
        $this->saldo_disponivel = $saldo_disponivel;

        global $db;
        $this->db = $db;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getRecurso()
    {
        return $this->recurso;
    }

    public function getSaldo_disponivel()
    {
        return $this->saldo_disponivel;
    }

    public function setId()
    {
        $this->id = $id;
    }

    public function setRecurso()
    {
        $this->recurso = $recurso;
    }

    public function setSaldo_disponivel()
    {
        $this->saldo_disponivel = $saldo_disponivel;
    }

    //funcao para Verificar saldo do CBC
    public function verificaSaldoRecurso($id_recurso, $valor_consumo)
    {

        $query = 'SELECT id, recurso, saldo_disponivel FROM cbc_recursos WHERE id = ' . $id_recurso;
        $conexao = $this->db->query($query);
        $dadosRecurso = $conexao->fetch(PDO::FETCH_OBJ);

        if ($valor_consumo <= $dadosRecurso->saldo_disponivel) {
            return true;
        } else {
            return false;
        }
    }


    //funcao para consumir recurso do CBC
    public function consumirRecursos($recurso_id, $valor_consumo)
    {
        try {
            $query = 'UPDATE cbc_recursos SET saldo_disponivel = saldo_disponivel-' . $valor_consumo . ' WHERE id = ' . $recurso_id;
            $conexao = $this->db->prepare($query);
            $conexao->execute();
        } catch (PDOException $e) {
            throw new Exception('Erro ao atualizar saldo: ' . $e->getMessage());
        }
    }
}
