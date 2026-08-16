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
    <link rel="stylesheet" href="../ASSETS/CSS/categoria.css">
    <title>Categoria</title>
</head>
<body>

    <!-- HEADER -->
    <header class="header">
        <div class="logo-container">
            <img src="../ASSETS/IMG/logo.png" alt="Ghost Gamer" class="logo-img">
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
            <li><a href="../index.php">Home</a></li>
            <li><a href="biblioteca.php">Biblioteca</a></li>
            <li><a href="categoria.php">Categoria</a></li>

            <!-- ADMIN ONLY -->
            <?php if ($tipo === "admin") { ?>
                <li><a href="../XAMP/consulta.php">Consulta</a></li>
                <li><a href="../PAGINAS/cadastroEmpresa.php">Cadastro de Empresa</a></li>
                <li><a href="cadastroJogos.php">Cadastro de Jogos</a></li>
            <?php } ?>

            <li><a href="perfil.php">Perfil</a></li>
            <li><a href="suporte.php">Suporte</a></li>
            <li><a href="loginCliente.php">Login</a></li>
            <li><a href="cadastroCliente.php">Cadastro</a></li>
            <li><a href="../XAMP/logout.php">SAIR</a></li>

        </ul>
    </nav>


    <!-- GRID DE JOGOS -->
    <div class="grid-jogos">
        <a href="#" class="card">Ação</a>
        <a href="#" class="card">Mistério</a>
        <a href="#" class="card">Terror</a>
        <a href="#" class="card">Puzzle</a>
        <a href="#" class="card">RPG</a>
        <a href="#" class="card">FPS</a>
        <a href="#" class="card">Aventura</a>
        <a href="#" class="card">Luta</a>
        <a href="#" class="card">MOBA</a>
    </div>

</div>

    <script src="../ASSETS/JS/categoria.JS"></script>
</body>
</html>
