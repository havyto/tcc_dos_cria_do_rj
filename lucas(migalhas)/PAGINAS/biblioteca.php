<?php
session_start();
error_reporting(E_ALL & ~E_DEPRECATED);

mysql_connect("localhost", "root", "");
mysql_select_db("ghost_gamer");

$tipo = isset($_SESSION["administrador"]) ? $_SESSION["administrador"] : "usuario";

if (!isset($_SESSION["id"])) {
    die("Você precisa estar logado para acessar sua biblioteca.");
}

$id_cliente = mysql_real_escape_string($_SESSION["id"]);

$sql = "SELECT jogo.*
        FROM biblioteca
        INNER JOIN jogo ON biblioteca.id_jogo = jogo.id_jogo
        WHERE biblioteca.id_cliente = '$id_cliente'
        ORDER BY biblioteca.data_adicionado DESC";

$resultado = mysql_query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ASSETS/CSS/biblioteca.css?v=2">
    <title>BIBLIOTECA</title>
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

        <?php if ($tipo === "admin") { ?>
            <li><a href="../XAMP/consulta.php">Consulta</a></li>
            <li><a href="../PAGINAS/cadastroEmpresa.php">Cadastro de Empresa</a></li>
            <li><a href="cadastroJogos.php">Cadastro de Jogos</a></li>
        <?php } ?>

        <?php if (!empty($_SESSION["id"])) {?>
        <li><a href="biblioteca.php">Biblioteca</a></li>
        <li><a href="categoria.php">Categoria</a></li>
        <li><a href="perfil.php">Perfil</a></li>
        <li><a href="suporte.php">Suporte</a></li>
        <li><a href="../XAMP/logout.php">SAIR</a></li>
        <?php }?>
        
    </ul>
</nav>

<div id="overlay" class="overlay"></div>

<main class="biblioteca">

    <section class="titulo-biblioteca">
        <h1>BIBLIOTECA DE JOGOS</h1>
        <p>Encontre seus jogos favoritos</p>
    </section>

    <!-- JOGOS RECENTES -->
    <section class="recentes">
        <h2>Jogos recentes</h2>

        <div class="lista-recentes">
            <?php
            $sql_recente = "SELECT jogo.* FROM biblioteca INNER JOIN jogo ON biblioteca.id_jogo = jogo.id_jogo
            WHERE biblioteca.id_cliente = '$id_cliente'ORDER BY biblioteca.data_adicionado DESC LIMIT 1";

            $resultado_recente = mysql_query($sql_recente);

            if (mysql_num_rows($resultado_recente) > 0) {
                $recente = mysql_fetch_assoc($resultado_recente);
            ?>
                <a href="jogo.php?id=<?php echo $recente["id_jogo"]; ?>">
                    <?php echo htmlspecialchars($recente["titulo"]); ?>
                </a>
            <?php
            } else {
                echo "<p>Nenhum jogo adicionado à biblioteca.</p>";
            }
            ?>
        </div>
    </section>

    <!-- TODOS OS JOGOS -->
    <section class="titulo-jogos">
        <h2>Todos os jogos</h2>
    </section>

    <section class="grid-jogos">
        <?php
        if (mysql_num_rows($resultado) > 0) {
            while ($jogo = mysql_fetch_assoc($resultado)) {
        ?>

        <a href="telaJogo.php?id=<?php echo $jogo["id_jogo"]; ?>" class="card">
            <div class="imagem-card">
                <img src="../<?php echo $jogo['foto']; ?>" alt="<?php echo htmlspecialchars($jogo["titulo"]); ?>">
            </div>

            <div class="informacoes-card">
                <h3><?php echo htmlspecialchars($jogo["titulo"]); ?></h3>
                <p><?php echo htmlspecialchars($jogo["genero"]); ?></p>
            </div>
        </a>

        <?php
            }
        } else {
            echo "<p>Você ainda não possui jogos na biblioteca.</p>";
        }
        ?>
    </section>

</main>

<script src="../ASSETS/JS/biblioteca.js"></script>
</body>
</html>