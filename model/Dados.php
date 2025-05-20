<?php

require_once('../model/BancoDados.php');

class Dados {

    private BancoDeDados $banco;
    private $cpf;
    private $conn;

    public function __construct($cpf , $conn){
        $this->cpf = $cpf;
        $this->conn = $conn;
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    public function setConn($conn){
        $this->conn = $conn;
    }

    public function conectarbanco(){
        $db = new BancoDeDados();
        $this->conn = $db->conectar();
        $sql = "insert into usuario (cpf) values ($1)";
        $prepare = pg_prepare($this->getConexao(), 'insert_into' , $sql);
        $execute = pg_execute($this->getConexao() , 'insert_into' , array($this->cpf));
    }
}
?>