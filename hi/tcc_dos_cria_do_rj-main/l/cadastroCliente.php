<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastro.css">
    <title>Cadastro de Cliente</title>
</head>
<body>

<form method="POST" action="gravarCadCliente.php">
    <div id="cadastro">
        <h1 class="h1">CADASTRO DE CLIENTE</h1>

        <input type="text" name="cli_nome" class="tam" placeholder="Digite seu nome completo" required><br>
        <input type="email" name="email" class="tam" placeholder="Digite seu e-mail" required><br>
        <input type="text" name="nickname" class="tam" placeholder="Digite seu nickname" required><br>
        <input type="password" name="senha" class="tam" placeholder="Digite sua senha" required><br><br>

        <a href="principal.php" class="button">Voltar</a>
        <input type="submit" class="button" value="GRAVAR">
        <input type="reset" class="button" value="Apagar">
    </div>
</form>

</body>
</html>
