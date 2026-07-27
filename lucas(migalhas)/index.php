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
    <link rel="stylesheet" href="ASSETS/CSS/index.css">
</head>
<body>

    <!-- HEADER -->
    <header class="header">
        <div class="logo-container">
            <img src="ASSETS/IMG/logo.png.png" class="logo-img">
            <span class="logo-text">
                <a href="index.php">GHOST GAMER</a>
            </span>
        </div>

        <div class="search-box">
            <input type="text" placeholder="Buscar jogos...">
        </div>

        <button id="menu-btn">☰</button>
    </header>

    <!-- MENU LATERAL -->
    <nav id="menu" class="menu">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="PAGINAS/biblioteca.html">Biblioteca</a></li>
            <li><a href="PAGINAS/categoria.html">Categoria</a></li>

            <!-- ADMIN ONLY -->
            <?php if ($tipo === "admin") { ?>
                <li><a href="XAMP/consulta.php">Consulta</a></li>
                <li><a href="XAMP/cadastroEmpresa.php">Cadastro de Empresa</a></li>
                <li><a href="PAGINAS/cadastroJogos.html">Cadastro de Jogos</a></li>
                <li><a href="XAMP/alteraCliente.php">Altera Cliente</a></li>
                <li><a href="XAMP/alteraEmpresa.php">Altera Empresa</a></li>
                <li><a href="XAMP/alteraJogo.php">Altera Jogo</a></li>
            <?php } ?>

            <li><a href="PAGINAS/perfil.html">Perfil</a></li>
            <li><a href="PAGINAS/suporte.html">Suporte</a></li>
            <li><a href="PAGINAS/loginCliente.html">Login</a></li>
            <li><a href="PAGINAS/cadastroCliente.html">Cadastro</a></li>
            <li><a href="XAMP/logout.php">SAIR</a></li>

        </ul>
    </nav>

    <!-- HERO -->
    <section class="hero">
        <div class="hero-content">
            <h2>Bem-vindo ao</h2>
            <h1>GHOST GAMER</h1>
            <p>Seus jogos favoritos em um só lugar</p>
            <button class="btn-download"><a href="XAMP/cadastroJogos.php">BAIXAR AGORA</a></button>
        </div>
    </section>

    <!-- JOGOS -->
    <section class="games-section">
        <h2 class="section-title">JOGOS EM DESTAQUE</h2>

        <div class="games-grid">
            <div class="game-card">
                <h3>Valorant</h3>
                <p>FPS tático</p>
                <button class="play-btn">JOGAR</button>
            </div>

            <div class="game-card">
                <h3>League of Legends</h3>
                <p>MOBA</p>
                <button class="play-btn">JOGAR</button>
            </div>

            <div class="game-card">
                <h3>CS:GO</h3>
                <p>FPS competitivo</p>
                <button class="play-btn">JOGAR</button>
            </div>
        </div>
    </section>

    <footer>
        <p>© 2026 - Ghost Gamer</p>
    </footer>

    <script src="ASSETS/JS/index.js"></script>

</body>
</html>