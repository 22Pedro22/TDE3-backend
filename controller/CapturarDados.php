<?php

    require_once('../model/Dados.php');

    class CapturarDados{
        private $cpf;

        public function getCpf(){
            return $this->cpf;
        }

        public function setCpf($cpf){
            $this->cpf = $cpf;
        }

        public function validar(){
            $cpf = preg_replace('/[^0-9]/', '', $this->cpf);

            if(strlen($cpf) != 11){
                echo "cpf invalido";
                return false;
            }
                echo "cpf cadastrado";
                return true;
        }
    }

    if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST["cpf"])){
        
        $cpf = $_POST["cpf"];

        $Validar = new CapturarDados();
        $Validar->setCpf($cpf);
        $Validar->validar();
        
        if($Validar->validar()){
            $Dados = new Dados($cpf , $conn);
            $Dados->conectarbanco();
        } 
    }
?>