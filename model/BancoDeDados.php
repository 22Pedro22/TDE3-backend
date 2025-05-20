<?php
class BancoDeDados {
    
    private $host = "127.0.0.1";
    private $port = "5432";
    private $dbname = "tde3";
    private $user = "postgres";
    private $password = "88548582";
    private $conexao;
    
    public function conectar() : bool {
        $conexao = pg_connect("host={$this->host} port={$this->port} dbname={$this->dbname} user={$this->user} password={$this->password}");

        if(!$conexao){
            echo "Falha na conexao com o banco de dados" . preg_last_error();
            return false;
        }

        $this->conexao = $conexao;
        return true;
    }

    public function desconectar() : bool {
        if(pg_close($this->conexao)) {
            return true;
        } else {
            return false;
        }
    }

    public function registrarNaTabela(string $tabela, array $dados) : bool {

    }

    public function getConexao() {
        return $this->conexao;
    }
}
?>