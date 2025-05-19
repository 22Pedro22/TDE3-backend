<?php
    class BancoDados{
        private $host = "127.0.0.1";
        private $port = "5432";
        private $dbname = "tde3";
        private $user = "postgres";
        private $password = "88548582";
        
        public function Conectar(){
            $conn = pg_connect("host={$host} port={$port} dbname={$dbname} user={$user} password={$password}");

            if(!$conn){
                echo "falha na conexao com o banco de dados" . preg_last_error();
            }
            return $conn;
        }
    }
?>