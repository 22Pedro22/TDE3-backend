<?php

require_once('FilmeDAO.php');

class CapturarDadosFilme {

    private $titulo;

    public function capturar() : bool{
        if(!isset($_POST["registrarFilme"])){
            return false;         
        }

        if(empty($_POST['titulo'])) {
            return false;
        }

        $this->titulo = $_POST["titulo"];
        return true;
    }

    public function getTitulo(){
        return $this->titulo;
    }
}
?>