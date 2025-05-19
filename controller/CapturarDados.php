<?php
    class CapturarDados{
        private $cpf;

        public function getCpf(){
            return $this->cpf;
        }

        public function setCpf($cpf){
            $this->cpf = $cpf;
        }

        public function Validar(){
            $cpf = preg_replace('/[^0-9]/', '', $this->cpf);

            if(strlen($cpf) != 11){
            echo "CPF inválido, tente novamente";
            return false;
            }
            echo "CPF cadastrado";
            return true;
        }
    }

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $cpf = $_POST["cpf"];

        $Dados = new CapturarDados();
        $Dados->setCpf($cpf);
        $Dados->Validar();
    }
?>