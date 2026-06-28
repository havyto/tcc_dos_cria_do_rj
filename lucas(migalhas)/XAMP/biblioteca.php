<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cad admin(provisório)</title>
</head>
<body>
    <?php
error_reporting(E_ALL & ~E_DEPRECATED);

$id = mysql_connect("localhost", "root", "");
if (!$id) {
    die("Erro na conexão: " . mysql_error());
}

mysql_select_db("ghost_gamer", $id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome  = $_POST['cli_nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nick  = $_POST['nickname'];

    $senhahash = password_hash($senha, PASSWORD_DEFAULT);

    // DEFININDO COMO ADMIN (se for cadastro de admin)
    $tipo = "admin";

    $sql = "INSERT INTO clientes (cli_nome, email, senha, nickname, administrador)
            VALUES ('$nome', '$email', '$senhahash', '$nick', '$tipo')";

    if (!mysql_query($sql)) {
        die("Erro no SQL: " . mysql_error());
    }

    mysql_close($id);

    header("Location: ../index.php");
    exit;
}
?>
    <h2>CADASTRO admin</h2>
                <form method="post">
                    <div class="input-group">
                        <label>Nome Completo</label>
                        <input type="text" name="cli_nome" placeholder="Digite seu nome completo">
                    </div>
                    <div class="input-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Digite seu email">
                    </div>
                    <div class="input-group">
                        <label>Nickname</label>
                        <input type="text" name="nickname" placeholder="Digite seu nickname">
                    </div>
                    <div class="input-group">
                        <label>Senha</label>
                        <input type="password" name="senha" placeholder="Digite sua senha">
                    </div>

                    <button type="submit">CRIAR CONTA</button>
                    
    
</body>
</html>