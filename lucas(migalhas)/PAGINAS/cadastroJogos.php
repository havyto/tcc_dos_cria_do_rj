<?php
session_start();

// pega tipo do usuário
$tipo = isset($_SESSION["administrador"]) ? $_SESSION["administrador"] : "usuario";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ghost Gamer - Cadastro de Jogos</title>
    <link rel="stylesheet" href="../ASSETS/CSS/cadastroCliente.css">
</head>
<body>
    <button id="menu-btn">☰</button>

    <nav id="menu" class="menu">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="biblioteca.php">Biblioteca</a></li>
            <li><a href="categoria.php">Categoria</a></li>

            <!-- ADMIN ONLY -->
            <?php if ($tipo === "admin") { ?>
                <li><a href="../XAMP/consulta.php">Consulta</a></li>
                <li><a href="../XAMP/cadastroEmpresa.php">Cadastro de Empresa</a></li>
                <li><a href="cadastroJogos.php">Cadastro de Jogos</a></li>
                <li><a href="../XAMP/alteraCliente.php">Altera Cliente</a></li>
                <li><a href="../XAMP/alteraEmpresa.php">Altera Empresa</a></li>
                <li><a href="../XAMP/alteraJogo.php">Altera Jogo</a></li>
            <?php } ?>

            <li><a href="perfil.php">Perfil</a></li>
            <li><a href="suporte.php">Suporte</a></li>
            <li><a href="loginCliente.html">Login</a></li>
            <li><a href="cadastroCliente.php">Cadastro</a></li>
            <li><a href="../XAMP/logout.php">SAIR</a></li>

        </ul>
    </nav>

    <div class="container">
        <div class="logo-container">
            <img src="../ASSETS/IMG/logo.png.png" alt="Ghost Gamer" class="logo-img">
            <span class="logo-text"><a href="../index.html">GHOST GAMER</a></span>
        </div>

        <!-- Apenas Cadastro Form - Centralizado -->
        <div class="cadastro-wrapper">
            <div class="form-box cadastro-box">
                <h2>CADASTRO</h2>
                <form method=POST action=gravarcad_Jogo.php>
                    <div class="input-group">
                        <label>Nome do Jogo</label>
                        <input type="text" placeholder="Digite o nome do jogo">
                    </div>
                    <div class="input-group">
                        <label>Contato do Empresa</label>
                        <input type="text" placeholder="Digite seu numero de contato">
                    </div>
                    <div class="input-group">
                        <label>Gêneros do Jogo</label>
                        <input type="checkbox">
                        <input type="checkbox">
                    </div>
                    <button type="submit" class="btn-cadastro">Cadastrar o Jogo</button>
                </form>
            </div>
        </div>
    </div>

    <script src="../ASSETS/JS/index.js"></script>
</body>
</html>