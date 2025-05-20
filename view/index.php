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
        <section>
            <fieldset>
                <legend>Comprar ingressos</legend>
                <form action="<? $_SERVER['PHP_SELF'] ?>" method="post">
                    <label>Nome:</label>
                    <input type="text" name="cpf" placeholder="Digite o seu nome">
                    <input type="submit" value="Enviar">
                </form>
            </fieldset>
        </section>
    </main>
</body>
</html>