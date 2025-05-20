<?php

require_once('../model/BancoDeDados.php');

class FilmeDAO {

    private BancoDeDados $banco;

    public function __construct(BancoDeDados $banco) {
        $this->banco = $banco;
    }

    public function registrar($titulo) : bool {
        if(!$this->banco->conectar()) {
            return false;
        }

        $dados = [
            "titulo" => $titulo
        ];

        if(!$this->banco->inserir("filme", $dados)) {
            return false;
        } else {
            return true;
        }
    }    
}
?>