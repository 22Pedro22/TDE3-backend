<?php

require_once __DIR__ . '/../model/BancoDeDados.php';
require_once __DIR__ . '/../controller/FilmeDAO.php';

$banco = new BancoDeDados();
$filmeDAO = new FilmeDAO($banco);
$filmes = $filmeDAO->retornarFilmes();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['cpf'] ?? '';
    $filme = $_POST['filmes'] ?? '';
    $sessao = $_POST['sessoes'] ?? '';
    $cadeira = $_POST['cadeiras'] ?? '';

    if (!empty(trim($nome))) {
        if ($banco->conectar()) {
            $dados = [
                'nome_usuario' => $nome,
                'filme' => $filme,
                'sessao' => $sessao,
                'cadeira' => $cadeira
            ];
            $banco->inserir('sessao', $dados);
            $banco->desconectar();
        }

        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

$sessoes = [];
if ($banco->conectar()) {
    $sessoes = $banco->consultarTodosOsDados('sessao');
    $banco->desconectar();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema</title>
</head>
<body>
    <header>
        <h1>Comprar ingressos</h1>
    </header>
    <main>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <section>
            <fieldset>
                <legend>Comprar ingressos</legend>
                <label>Nome:</label>
                <input type="text" name="cpf" placeholder="Digite o seu nome">
            </fieldset>
        </section>
        <section>
            <fieldset>
                <legend>Escolher filme</legend>
                <select name="filmes" id="filme">
                   <?php foreach ($filmes as $titulo): ?>
                        <option value="<?php echo htmlspecialchars($titulo); ?>"><?php echo htmlspecialchars($titulo); ?></option>
                    <?php endforeach; ?>
                </select>
            </fieldset>
        </section>
        <section>
            <fieldset>
                <legend>Escolher Sessao</legend>
                <select name="sessoes">
                    <option value="sessao1">Sessao 1 (9:00 - 11:00)</option>
                    <option value="sessao2">Sessao 2 (12:00 - 14:00)</option>
                    <option value="sessao3">Sessao 3 (15:00 - 17:00)</option>
                    <option value="sessao4">Sessao 4 (18:00 - 20:00)</option>
                    <option value="sessao5">Sessao 5 (21:00 - 23:00)</option>
                </select>
            </fieldset>
        </section>
        <section>
            <fieldset>
                <legend>Esolher Cadeira</legend>
                <select name="cadeiras">
                    <option value="cadeira1">Cadeira 1</option>
                    <option value="cadeira2">Cadeira 2</option>
                    <option value="cadeira3">Cadeira 3</option>
                    <option value="cadeira4">Cadeira 4</option>
                    <option value="cadeira5">Cadeira 5</option>
                </select>
            </fieldset>
        </section>
        <button type="submit">Comprar</button>
    </form>
   <section>
    <fieldset>
        <legend>Sessões cadastradas</legend>
        <?php if (count($sessoes) > 0): ?>
            <?php foreach ($sessoes as $sessao): ?>
                <p>
                    Sessão cadastrada: 
                    <?php echo htmlspecialchars($sessao['nome_usuario']); ?>, 
                    <?php echo htmlspecialchars($sessao['filme']); ?>, 
                    <?php echo htmlspecialchars($sessao['sessao']); ?>, 
                    <?php echo htmlspecialchars($sessao['cadeira']); ?>
                </p>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhuma sessão cadastrada ainda.</p>
        <?php endif; ?>
    </fieldset>
</section>
</main>
</body>
</html>