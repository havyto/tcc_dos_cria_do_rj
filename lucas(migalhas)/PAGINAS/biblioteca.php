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
    <link rel="stylesheet" href="../ASSETS/CSS/biblioteca.css">
    <title>BIBLIOTECA</title>
</head>
<body>

    <!-- HEADER -->
    <header class="header">
        <div class="logo-container">
            <img src="../ASSETS/IMG/logo.png.png" alt="Ghost Gamer" class="logo-img">
            <span class="logo-text"><a href="../index.php">GHOST GAMER</a></span>
        </div>
        <div class="search-box">
            <input type="text" id="searchInput" placeholder="Buscar jogos...">
        </div>
        <button id="menu-btn">☰</button>
    </header>

    <!-- MENU LATERAL -->
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

    <!-- JOGOS RECENTES (lateral) -->
    <div class="recentes">
        <h3>Jogos recentes</h3>

        <div class="lista-recentes">
            <a href="#">Jogo 1</a>
            <a href="#">Jogo 2</a>
            <a href="#">Jogo 3</a>
            <a href="#">Jogo 4</a>
            <a href="#">Jogo 5</a>
        </div>
    </div>

    <!-- GRID DE JOGOS -->
    <div class="grid-jogos">
        <a href="#" class="card">Jogo</a>
        <a href="#" class="card">Jogo</a>
        <a href="#" class="card">Jogo</a>
        <a href="#" class="card">Jogo</a>
        <a href="#" class="card">Jogo</a>

        <a href="#" class="card">Jogo</a>
        <a href="#" class="card">Jogo</a>
        <a href="#" class="card">Jogo</a>
        <a href="#" class="card">Jogo</a>
        <a href="#" class="card">Jogo</a>
    </div>

</div>

    <script src="../ASSETS/JS/biblioteca.js"></script>
</body>
</html>
