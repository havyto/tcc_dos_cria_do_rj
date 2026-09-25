<?php 
session_start();

// pega tipo do usuário
$tipo = isset($_SESSION["administrador"]) ? $_SESSION["administrador"] : "usuario";

// Variáveis do header
$base = "../";
$pagina = "login";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ghost Gamer - Cadastro</title>
    <link rel="stylesheet" href="../ASSETS/CSS/ghost.css">
    <link rel="stylesheet" href="../ASSETS/CSS/cadastroCliente.css">
</head>
<body>

    <?php include "../INCLUDES/header.php"; ?>

    <main class="container">

        <!-- Apenas Cadastro Form - Centralizado -->
        <div class="cadastro-wrapper auth">
            <div class="form-box cadastro-box auth-card">

                <div class="auth-tabs">
                    <a href="loginCliente.php">Entrar</a>
                    <a href="cadastroCliente.php" aria-current="page">Cadastrar</a>
                </div>

                <h1>Cadastro</h1>
                <p class="auth-sub">Crie sua conta e monte sua biblioteca no Ghost Gamer.</p>

                <form method="post" action="../XAMP/gravarcad.php">
                    <div class="input-group">
                        <label for="campoNome">Nome Completo</label>
                        <input type="text" name="cli_nome" id="campoNome" placeholder="Digite seu nome completo" autocomplete="name">
                    </div>
                    <div class="input-group">
                        <label for="campoEmail">Email</label>
                        <input type="email" name="email" id="campoEmail" placeholder="Digite seu email" autocomplete="email">
                    </div>
                    <div class="input-group">
                        <label for="campoNick">Nickname</label>
                        <input type="text" name="nickname" id="campoNick" placeholder="Digite seu nickname" autocomplete="username">
                    </div>
                    <div class="input-group">
                        <label for="campoSenha">Senha</label>
                        <input type="password" name="senha" id="campoSenha" placeholder="Digite sua senha" autocomplete="new-password">
                    </div>
                    <button type="submit" class="btn btn-primario btn-bloco btn-cadastro">Criar conta</button>

                    <div class="auth-links login-link">
                        <p>Já tem uma conta? <a href="loginCliente.php">Faça login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php include "../INCLUDES/footer.php"; ?>

    <script src="../ASSETS/JS/index.js"></script>
</body>
</html>
