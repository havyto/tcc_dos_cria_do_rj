<?php
session_start();

error_reporting(E_ALL & ~E_DEPRECATED);

// CONEXÃO
$id = mysql_connect("localhost", "root", "");

if (!$id) {
    die("Erro ao conectar: " . mysql_error());
}

mysql_select_db("ghost_gamer", $id);

// VERIFICA COOKIE
if (!isset($_SESSION["id"]) && isset($_COOKIE["lembrar_usuario"])) {

    $id_cliente = $_COOKIE["lembrar_usuario"];

    $sql = "SELECT id_cliente, cli_nome, administrador
            FROM clientes
            WHERE id_cliente = '$id_cliente'";

    $resultado = mysql_query($sql);

    if (mysql_num_rows($resultado) > 0) {

        $usuario = mysql_fetch_assoc($resultado);

        $_SESSION["id"] = $usuario["id_cliente"];
        $_SESSION["nome"] = $usuario["cli_nome"];
        $_SESSION["administrador"] = $usuario["administrador"];
    }
}

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
            <img src="ASSETS/IMG/logo.png" class="logo-img">
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
            <!-- ADMIN ONLY -->
            <?php if ($tipo === "admin") { ?>
                <li><a href="XAMP/consulta.php">Consulta</a></li>
                <li><a href="PAGINAS/cadastroEmpresa.php">Cadastro de Empresa</a></li>
                <li><a href="PAGINAS/cadastroJogos.php">Cadastro de Jogos</a></li>
            <?php } ?>

            <?php if (!empty($_SESSION["id"])) {?>
                <li><a href="PAGINAS/biblioteca.php">Biblioteca</a></li>
                <li><a href="PAGINAS/categoria.php">Categoria</a></li>
                <li><a href="PAGINAS/perfil.php">Perfil</a></li>
                <li><a href="PAGINAS/suporte.php">Suporte</a></li>
                <li><a href="XAMP/logout.php">SAIR</a></li>
            <?php }?>

            <?php if (empty($_SESSION["id"])) {?>
            <li><a href="PAGINAS/loginCliente.php">Login</a></li>
            <?php }?>

        </ul>
    </nav>

    <!-- HERO -->
    <section class="hero">
        <div class="hero-content">
            <h2>Bem-vindo ao</h2>
            <h1>GHOST GAMER</h1>
            <p>Seus jogos favoritos em um só lugar</p>
            <button class="btn-download"><a href="PAGINAS/telaJogo.php">BAIXAR AGORA</a></button>
        </div>
    </section>

    <!-- JOGOS -->
    <section class="games-section">
        <h2 class="section-title">JOGOS EM DESTAQUE</h2>

        <div class="games-grid">
            <div class="game-card">
                <h3>Valorant</h3>
                <p>FPS tático</p>
                <button class="play-btn"><a href="PAGINAS/telaJogo.php">JOGAR</a></button>
            </div>

            <div class="game-card">
                <h3>League of Legends</h3>
                <p>MOBA</p>
                <button class="play-btn"><a href="PAGINAS/telaJogo.php">JOGAR</a></button>
            </div>

            <div class="game-card">
                <h3>CS:GO</h3>
                <p>FPS competitivo</p>
                <button class="play-btn"><a href="PAGINAS/telaJogo.php">JOGAR</a></button>
            </div>
        </div>
    </section>

    <footer>
        <p>© 2026 - Ghost Gamer</p>
    </footer>

    <script src="ASSETS/JS/index.js"></script>

</body>
</html>