<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . "../../model/BancoDeDados.php";
require_once __DIR__ . "../../controller/FilmeDAO.php";

if(isset($_POST['alterarFilme']) && isset($_POST['tituloNovo']) && !empty($_POST['tituloNovo'])) {
    $banco = new BancoDeDados();
    $dao = new FilmeDAO($banco);
    $dao->atualizarTitulo($_POST['tituloAntigo'], $_POST['tituloNovo']);
}
?>