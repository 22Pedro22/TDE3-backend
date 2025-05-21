<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . "../../controller/FilmeDAO.php";
require_once __DIR__ . "../../model/BancoDeDados.php";

//Essa classe serve pra capturar os dados do formulário "registrar novos filmes"
class CapturarDadosFilme {

    // Cria o atributo do titulo do filme
    private $titulo;

    //Função que verifica se o usuário clicou no botão submit e verifica se o campo está vazio 
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

        $dados = [
            'titulo' => $this->titulo
        ];
        
        return true;
    }

    //Retorna o título capturado
    public function getTitulo(){
        return $this->titulo;
    }
}



?>