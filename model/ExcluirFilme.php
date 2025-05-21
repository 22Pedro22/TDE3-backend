<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . "../../model/BancoDeDados.php";
require_once __DIR__ . "../../controller/FilmeDAO.php";

$banco = new BancoDeDados();
$dao = new FilmeDAO($banco);

if(isset($_POST['excluirFilme'])) {
    $condicoes = [
        "titulo" => $_POST['tituloAntigo']
    ];
    
    if($dao->excluirFilme($condicoes)) {
        echo $_POST['tituloAntigo'] . " foi excluido com sucesso!";
    }
}
?>