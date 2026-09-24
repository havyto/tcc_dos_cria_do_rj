```php
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Ghost Gamer - Recuperar senha</title>
</head>

<body>

    <h2>RECUPERAR SENHA</h2>

    <p>Digite o e-mail cadastrado:</p>

    <form method="post" action="../XAMP/enviarRecuperacao.php">

        <input
            type="email"
            name="email"
            placeholder="Digite seu email"
            required
        >

        <br><br>

        <button type="submit">
            ENVIAR CÓDIGO
        </button>

    </form>

    <br>

    <a href="loginCliente.php">
        Voltar para o login
    </a>

</body>

</html>
```
