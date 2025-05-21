<?php
class BancoDeDados {
    
    //Os atributos dessa classe servem para realizar a conexão com o banco de dados da forma correta.
    private $host = "127.0.0.1";
    private $port = "5432";
    private $dbname = "tde3";
    private $user = "postgres";
    private $password = "88548582";
    private $conexao;
    
    //Função para realizar a conexão com o banco de dados
    public function conectar() : bool {
        $conexao = pg_connect("host={$this->host} port={$this->port} dbname={$this->dbname} user={$this->user} password={$this->password}");

        if(!$conexao){
            echo "Falha na conexao com o banco de dados" . preg_last_error();
            return false;
        }

        $this->conexao = $conexao;
        return true;
    }

    //Função para desconectar com o banco de dados
    public function desconectar() : bool {
        if(pg_close($this->conexao)) {
            return true;
        } else {
            return false;
        }
    }

    //Função para inserir dados em alguma tabela do banco de dados, onde $dados deve ser um array chave/valor
    public function inserir(string $tabela, array $dados) : bool {
        $colunas = array_keys($dados);
        $valores = array_values($dados);
        $placeholders = [];

        for($i = 1; $i <= count($colunas); $i++) {
            $placeholders[] = '$' . $i;
        }        

        $query = "INSERT INTO {$tabela} (" . implode(',', $colunas) . ") VALUES (" . implode(', ', $placeholders) . ")";
        $resultado = pg_query_params($this->conexao, $query, $valores);

        if($resultado === false) {
            error_log("Erro ao inserir no banco de dados! " . pg_last_error($this->conexao));
            return false;
        } else {
            pg_free_result($resultado);
            return true;
        }
    }

    //Função para consultar todos os dados de uma $tabela
    public function consultarTodosOsDados(string $tabela) : array {
        $query = "SELECT * FROM {$tabela}";
        $resultado = pg_query($this->conexao, $query);

        if($resultado === false) {
            error_log("Erro ao consultar todos os dados: " . pg_last_error($this->conexao));
            return [];
        }

        $dados = [];
        while($linha = pg_fetch_assoc($resultado)) {
            $dados[] = $linha;
        }

        pg_free_result($resultado);
        return $dados;
    }

    //Consulta numa $tabela de acordo com os $dados, e retorna o id encontrado
    public function retornarId(string $tabela, array $dados) : string {
        $condicoes = [];
        $valores = [];
        $i = 1;

        foreach($dados as $chave => $valor) {
            $condicoes[] = "{$chave} = \${$i}";
            $valores[] = $valor;
            $i++;
        }

        $query = "SELECT id FROM {$tabela} WHERE (" . implode(' AND ', $condicoes) . ")";
        $resultado = pg_query_params($this->conexao, $query, $valores);

        if($resultado === false) {
            error_log("Erro ao consultar ID: " . pg_last_error($this->conexao));
            return "";
        }

        $id = pg_fetch_assoc($resultado);
        pg_free_result($resultado);

        return $id['id'] ?? '';
    }

    public function atualizar(string $tabela, array $dados) {

    }

    //Retorna a conexão com o banco de dados
    public function getConexao() {
        return $this->conexao;
    }
}
?>