<?php
require_once('config/db.php');
class Clube
{
    public $id;
    public $nome_clube;
    public $saldo_disponivel;
    private $db;


    public function __construct($id = null, $nome_clube = null, $saldo_disponivel = null)
    {
        $this->id = $id;
        $this->nome_clube = $nome_clube;
        $this->saldo_disponivel = $saldo_disponivel;

        global $db;
        $this->db = $db;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome_clube()
    {
        return $this->nome_clube;
    }

    public function getSaldo_disponivel()
    {
        return $this->saldo_disponivel;
    }

    public function setId()
    {
        $this->id = $id;
    }

    public function setNome_clube()
    {
        $this->nome_clube = $nome_clube;
    }

    public function setSaldo_disponivel()
    {
        $this->saldo_disponivel = $saldo_disponivel;
    }

    //funcao para listar todos os clubes
    public function listarClubes()
    {
        $query = 'SELECT id, nome_clube, saldo_disponivel FROM cbc_clubes';
        $conexao = $this->db->query($query);
        $dadosClube = $conexao->fetchAll(PDO::FETCH_ASSOC);

        // Converter os dados do banco de dados em objetos clube
        $clubes = [];
        foreach ($dadosClube as $clubeData) {
            $clube = new Clube($clubeData['id'], $clubeData['nome_clube'], $clubeData['saldo_disponivel']);

            $clubes[] = $clube;
        }

        return $clubes;
    }

    //funcao para cadastrar clubes
    public function cadastrarClube($nome_clube, $saldo_disponivel)
    {

        try {
            $query = 'INSERT INTO cbc_clubes (nome_clube, saldo_disponivel) VALUES ("' . $nome_clube . '",' . $saldo_disponivel . ')';
            $conexao = $this->db->prepare($query);
            $conexao->execute();

            return true;
        } catch (PDOException $e) {
            throw new Exception('Erro ao cadastrar clube: ' . $e->getMessage());
        }
    }
}
