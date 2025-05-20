<?php
class BancoDados {
    private $host = "127.0.0.1";
    private $port = "5432";
    private $dbname = "tde3";
    private $user = "postgres";
    private $password = "88548582";
    private $conexao;
        
    public function conectar(){
        $this->conexao = pg_connect("host={$this->host} port={$this->port} dbname={$this->dbname} user={$this->user} password={$this->password}");

        if(!$this->conexao){
            echo "Falha na conexao com o banco de dados" . preg_last_error();
        }

        return $this->conexao;
    }
}
?>