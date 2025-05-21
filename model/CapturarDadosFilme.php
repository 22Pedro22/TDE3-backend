<?php

// Chama o arquivo responsável pela conexao como o banco e a inserçao dos dados
require_once('FilmeDAO.php');

// Cria a classe reponsável por capturar os dados
class CapturarDadosFilme {

    // Cria o atributo do titulo do filme
    private $titulo;

    // Cria o método responsável por capturar o titulo que o usuário mandar
    public function capturar() : bool{

        // Condicional que verifica se o usuário mandou um titulo de filme 
        if(!isset($_POST["registrarFilme"])){
            return false;         
        }

        // Condicional que verifica se o campo está vazio
        if(empty($_POST['titulo'])) {
            return false;
        }

        // Define o atributo do titulo como o titulo que o usuário mandou
        $this->titulo = $_POST["titulo"];
        return true;
    }
    
    // Getter para puxar o titulo
    public function getTitulo(){
        return $this->titulo;
    }
}
?>