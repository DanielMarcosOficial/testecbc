<?php

class Recurso
{
    private $id;
    private $recurso;
    private $saldo_disponivel;

    public function __construct($id, $recurso, $saldo_disponivel)
    {
        $this->id = $id;
        $this->recurso = $recurso;
        $this->saldo_disponivel = $saldo_disponivel;
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
}
