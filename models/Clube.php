<?php

class Clube
{
    private $id;
    private $nome_clube;
    private $saldo_disponivel;

    public function __construct($id, $nome_clube, $saldo_disponivel)
    {
        $this->id = $id;
        $this->nome_clube = $nome_clube;
        $this->saldo_disponivel = $saldo_disponivel;
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
}
