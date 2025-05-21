<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . "../../model/BancoDeDados.php";

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
            $this->banco->desconectar();
            return true;
        }
    }
    
    public function verificarFilmeExiste($titulo) : bool {
        $this->banco->conectar();

        $dados = [
            "titulo" => $titulo
        ];
        $filme = $this->banco->retornarId('filme', $dados);

        if(empty($filme)) {
            return false;
        }
        
        $this->banco->desconectar();
        return true;
    }

    public function retornarFilmes() : array {
        $this->banco->conectar();
        
        $dados = $this->banco->consultarTodosOsDados('filme');

        $titulos = array_column($dados, 'titulo');

        return $titulos;
    }

    public function atualizarTitulo(string $tituloAntigo, string $novoTitulo) : bool {
        if(!$this->banco->conectar()) {
            return false;
        }

        $dados = [
            "titulo" => $novoTitulo
        ];

        $condicoes = [
            "titulo" => $tituloAntigo
        ];

        if(!$this->banco->atualizar('filme', $dados, $condicoes)) {
            return false;
        }
        
        $this->banco->desconectar();
        return true;
    }

    public function excluirFilme($condicoes) {
        if(!$this->banco->conectar()) {
            return false;
        }
        if(!$this->banco->excluir("filme", $condicoes)) {
            $this->banco->desconectar();
            return false;
        }

        $this->banco->desconectar();
        return true;
    }
}
?>