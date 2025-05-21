<?php

    require_once('FilmeDAO.php');

    class CapturarFilme{
        private $titulo;

        public function getTitulo(){
            return $this->titulo;
        }

        public function capturar() : bool{
            if(!isset($_POST["registrarFilme"])){
                return false;         
            }
                $titulo = $_POST["titulo"];
                return true;
        }
    }

    $Dados = new CapturarDadosAdm();  
?>