```php
<?php
session_start();

if (!isset($_SESSION["email_recuperacao"])) {
    die("Sessão inválida.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Ghost Gamer - Verificar código</title>
</head>

<body>

    <h2>VERIFICAR CÓDIGO</h2>

    <p>
        Digite o código enviado para seu e-mail:
    </p>

    <form method="post" action="../XAMP/verificarCodigo.php">

        <input
            type="text"
            name="codigo"
            maxlength="6"
            placeholder="Digite o código"
            required
        >

        <br><br>

        <button type="submit">
            VERIFICAR CÓDIGO
        </button>

    </form>

</body>

</html>
```
