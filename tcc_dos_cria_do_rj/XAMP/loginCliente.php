<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ghost Gamer - Login</title>
    <link rel="stylesheet" href="../ASSETS/CSS/loginCliente.css">
</head>
<body>
    <button id="menu-btn">☰</button>

    <nav id="menu" class="menu">
        <ul>
            <li><a href="../index.html">Home</a></li>
            <li><a href="biblioteca.html">Biblioteca</a></li>
            <li><a href="categoria.html">Categoria</a></li>
            <li><a href="loginCliente.html">Login</a></li>
            <li><a href="cadastroCliente.html">Cadastro</a></li>
            <li><a href="suporte.html">Suporte</a></li>
        </ul>
    </nav>

    <div class="container">
        <div class="logo-container">
            <img src="../ASSETS/IMG/logo.png.png" alt="Ghost Gamer" class="logo-img">
            <span class="logo-text"><a href="../index.html">GHOST GAMER</a></span>
        </div>

        <!-- Apenas Login Form - Centralizado -->
        <div class="login-wrapper">
            <div class="form-box login-box">
                <h2>LOGIN</h2>
                <form method="post">
                    <div class="input-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Digite seu email">
                    </div>
                    <div class="input-group">
                        <label>Senha</label>
                        <input type="password" name="senha" placeholder="Digite sua senha">
                    </div>
                    <div class="checkbox-group">
                        <input type="checkbox" id="lembrar">
                        <label for="lembrar">Lembrar-me</label>
                    </div>
                    <button type="submit" class="btn-login">LOGIN</button>
                    <a href="../PAGINAS/esqueciSenha.html" class="forgot-password">Esqueci minha senha</a>
                    
                    <div class="cadastro-link">
                        <p>Não tem uma conta? <a href="cadastroCliente.html">Cadastre-se</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    session_start();
    error_reporting(0);
    mysql_connect("localhost","root","");
    mysql_select_db("ghost_gamer");

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = trim($_POST['email']);
        $senha = $_POST['senha'];

        $usuario = "SELECT email, id_cliente, senha, cli_nome FROM clientes WHERE email = $email ";

        if($email === $usuario(['email'])){
            if(password_verify($senha, $usuario['senha'])){
                session_regenerate_id(true);
                echo "Login realizado com sucesso! Senha correta.";
            }
         else {
            echo "E-mail ou senha incorretos.";
            }
        }
        
    }
    header("location: ..index.html")
?>
    <script src="../ASSETS/JS/index.js"></script>
</body>
</html>