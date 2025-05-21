<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . "../../model/CapturarDadosSessao.php";
require_once __DIR__ . "../../model/CapturarDadosFilme.php";
require_once __DIR__ . "../../model/FilmesRegistrados.php";
require_once __DIR__ . "../../model/RegistrarFlme.php";
require_once __DIR__ . "../../model/AtualizarFilme.php";
require_once __DIR__ . "../../model/ExcluirFilme.php";

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área ADM</title>
</head>
<body>
    <main>
        <section>
            <h1>Registrar novos filmes</h1>
            <fieldset>
                <legend>Registrar filme</legend>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <label>Título do filme:</label>
                    <input type="text" name="titulo" placeholder="Digite o título do filme">
                    <br>
                    <input type="submit" name="registrarFilme" value="Registrar">
                </form>
            </fieldset>
        </section>
        <section>
            <h1>Registrar novas sessões</h1>
            <fieldset>
                <legend>Registrar sessão</legend>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <label>Data:</label>
                    <input type="date" name="data">
                    <br>
                    <label>Hora:</label>
                    <input type="time" name="hora">
                    <br>
                    <label>Filme:</label>
                    <select name="filme">
                    </select>
                    <br>
                    <input type="submit" name= "registrarSessao" value="Registrar">
                </form>
            </fieldset>
        </section>
        <section>
            <h3>Lista de filmes:</h3>
            <fieldset>
                <legend>Filme registrados:</legend>
                <table>
                    <?php foreach($titulos as $titulo) : ?>
                        <tr>
                            <td><?php echo $titulo; ?></td>
                            <td>
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                    <input type="hidden" name="tituloAntigo" value="<?php echo $titulo; ?>">
                                    <input type="text" name="tituloNovo" value="" placeholder="Digite o novo título">
                                    <button type="submit" name="alterarFilme">Alterar</button>
                                    <button type="submit" name="excluirFilme">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>    
                </table>
            </fieldset>
        </section>
        <section>
            <h3>Lista de sessões:</h3>
        </section>
    </main>
</body>
</html>