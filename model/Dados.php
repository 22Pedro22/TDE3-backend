<?php

    require_once('../config/BancoDados.php');

    class Dados{
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

        public function ConectarBanco(){
            $db = new BancoDados();
            $this->conn = $db->Conectar();
            $sql = "insert into usuario (cpf) values ($1)";
            $prepare = pg_prepare($this->conn , 'insert_into' , $sql);
            $execute = pg_execute($this->conn , 'insert_into' , array($this->cpf));
        }
    }
?>