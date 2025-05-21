<?php

require_once "../model/CapturarDadosSessao.php";
require_once "../controller/CapturarFilme.php";

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
    </main>
</body>
</html>