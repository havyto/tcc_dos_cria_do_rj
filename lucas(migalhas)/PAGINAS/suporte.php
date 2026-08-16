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
    <title>Ghost Gamer - Home</title>
    <link rel="stylesheet" href="../ASSETS/CSS/suporte.css">
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

    <!-- HERO -->
    <section class="hero">
        <h2>Suporte</h2>
    </section>
            
        <!-- JOGOS -->
        <div class="suporteContent">
            <ul class="msuporte">
                <li><a href="index.html" class="suporte">JOGOS</a></li><br>
                <li><a href="PAGINAS/biblioteca.html" class="suporte">Comparação de Requisitos</a></li><br>
                <li><a href="PAGINAS/perfil.html" class="suporte">Minha Conta</a></li><br>
            </ul>
        </div>
    </div>

    <footer>
        <p>© 2026 - Ghost Gamer</p>
    </footer>

    <script src="../ASSETS/JS/index.js"></script>

</body>
</html>