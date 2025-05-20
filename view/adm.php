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
            <fieldset>
                <legend>Registrar filme</legend>
                <form action="<? $_SERVER['PHP_SELF'] ?>" method="post">
                    <label>Título do filme:</label>
                    <input type="text" name="titulo" placeholder="Digite o título do filme">
                    <br>
                    <label>Descricao do filme:</label>
                    <input type="text" name="descricao" placeholder="Descrição do filme(opcional)">
                    <input type="submit" value="Enviar">
                </form>
            </fieldset>
        </section>
        <section>
            <fieldset>
                <legend>Registrar sessão</legend>
                <form action="<? $_SERVER['PHP_SELF'] ?>" method="post">
                    <label></label>
                </form>
            </fieldset>
        </section>
    </main>
</body>
</html>