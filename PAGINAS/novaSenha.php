```php
<?php

session_start();

if (!isset($_SESSION["codigo_verificado"])) {

    die("Acesso inválido.");

}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Ghost Gamer - Nova senha</title>

</head>

<body>

    <h2>NOVA SENHA</h2>

    <form method="post" action="../XAMP/novaSenha.php">

        <label>Nova senha:</label>

        <br>

        <input
            type="password"
            name="senha"
            required
        >

        <br><br>

        <label>Confirme sua senha:</label>

        <br>

        <input
            type="password"
            name="confirmar_senha"
            required
        >

        <br><br>

        <button type="submit">
            ALTERAR SENHA
        </button>

    </form>

</body>

</html>
```
