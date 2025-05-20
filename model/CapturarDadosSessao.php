<?php

class CapturarDadosSessao {

    private $data;
    private $hora;
    
    public function capturarDados() : bool {
        //Verifica se o usuario apertou o botão para registrar nova sessão
        if(!isset($_POST['registrarSessao'])) {
            return false;
        }

        //Verifica se o campo data está vazio
        if(empty($_POST['data'])) {
            return false;
        }

        //Verifica se o campo de hora está vazio
        if(empty($_POST['hora'])) {
            return false;
        }

        return true;
    }
}
$c = new CapturarDadosSessao();
if($c->capturarDados()) {
    echo "TRUE";
} else {
    echo "FALSE";
}
?>