<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . "../../model/BancoDeDados.php";
require_once __DIR__ . "../../controller/FilmeDAO.php";
require_once __DIR__ . "../../model/CapturarDadosFilme.php";

$banco = new BancoDeDados();
$filmeDAO = new FilmeDAO($banco);
$capturar = new CapturarDadosFilme();

if($capturar->capturar()) {
    if($filmeDAO->verificarFilmeExiste($capturar->getTitulo())) {
        echo "Filme já foi registrado anteriormente!";
    } else {
        if($filmeDAO->registrar($capturar->getTitulo())) {
            echo "{$capturar->getTitulo()} foi registrado com sucesso!";
        }
    }  
}
?>
