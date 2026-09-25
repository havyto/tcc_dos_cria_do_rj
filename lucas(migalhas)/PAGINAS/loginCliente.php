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
    <title>Ghost Gamer - Login</title>
    <link rel="stylesheet" href="../ASSETS/CSS/ghost.css">
    <link rel="stylesheet" href="../ASSETS/CSS/loginCliente.css">
</head>
<body>

    <?php include "../INCLUDES/header.php"; ?>

    <main class="container">
        <div class="login-wrapper auth">
            <div class="form-box login-box auth-card">

                <div class="auth-tabs">
                    <a href="loginCliente.php" aria-current="page">Entrar</a>
                    <a href="cadastroCliente.php">Cadastrar</a>
                </div>

                <h1>Login</h1>
                <p class="auth-sub">Entre para acessar sua biblioteca de jogos.</p>

                <p id="mensagemErro" role="alert"></p>

                <form method="post" action="../XAMP/loginCliente.php" id="formLogin">

                    <div class="input-group">
                        <label for="campoEmail">Email</label>
                        <input type="email" name="email" id="campoEmail" placeholder="Digite seu email" autocomplete="email" required>
                    </div>

                    <div class="input-group">
                        <label for="campoSenha">Senha</label>
                        <input type="password" name="senha" id="campoSenha" placeholder="Digite sua senha" autocomplete="current-password" required>
                    </div>

                    <div class="checkbox-group">
                        <input type="checkbox" id="lembrar" name="lembrar">
                        <label for="lembrar">Lembrar-me</label>
                    </div>

                    <button type="submit" class="btn btn-primario btn-bloco btn-login">
                        Entrar
                    </button>

                    <div class="auth-links">
                        <a href="../PAGINAS/esqueciSenha.html" class="forgot-password">
                            Esqueci minha senha
                        </a>

                        <div class="cadastro-link">
                            <p>
                                Não tem uma conta?
                                <a href="cadastroCliente.php">Cadastre-se</a>
                            </p>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </main>

    <?php include "../INCLUDES/footer.php"; ?>

    <script src="../ASSETS/JS/index.js"></script>
</body>
</html>
