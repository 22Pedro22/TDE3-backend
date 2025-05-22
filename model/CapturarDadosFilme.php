<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . "../../controller/FilmeDAO.php";
require_once __DIR__ . "../../model/BancoDeDados.php";


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

        $dados = [
            'titulo' => $this->titulo
        ];
        
        return true;
    }

    
    public function getTitulo(){
        return $this->titulo;
    }
}



?>