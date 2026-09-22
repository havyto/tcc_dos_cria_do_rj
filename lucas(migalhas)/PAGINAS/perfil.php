<?php
session_start();
error_reporting(E_ALL & ~E_DEPRECATED);
mysql_connect("localhost", "root", "");
mysql_select_db("ghost_gamer");

// pega tipo do usuário
$tipo = isset($_SESSION["administrador"]) ? $_SESSION["administrador"] : "usuario";

$id_cliente = mysql_real_escape_string($_SESSION["id"]);

$sql = "SELECT * FROM clientes WHERE id_cliente = '$id_cliente'";
$resultado = mysql_query($sql);

$usuario = mysql_fetch_assoc($resultado);
$nome = $usuario["cli_nome"];
$email = $usuario["email"];
$nick = $usuario["nickname"];
$senha = $usuario["senha"];

// busca os jogos da biblioteca
$sql_jogos = "SELECT jogo.*
              FROM biblioteca
              INNER JOIN jogo ON biblioteca.id_jogo = jogo.id_jogo
              WHERE biblioteca.id_cliente = '$id_cliente'
              ORDER BY biblioteca.data_adicionado DESC";

$resultado_jogos = mysql_query($sql_jogos);

// conta os jogos
$total_jogos = mysql_num_rows($resultado_jogos);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ghost Gamer - Perfil</title>
    <link rel="stylesheet" href="../ASSETS/CSS/perfil.css">
</head>
<body>

    <!-- HEADER -->
    <header class="header">
        <div class="logo-container">
            <img src="../ASSETS/IMG/logo.png" alt="Ghost Gamer" class="logo-img">
            <span class="logo-text"><a href="../index.php">GHOST GAMER</a></span>

            <div class="search-box">
                <input type="text" id="searchInput" placeholder="Buscar jogos...">
            </div>
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

            <?php if (!empty($_SESSION["id"])) { ?>
                <li><a href="biblioteca.php">Biblioteca</a></li>
                <li><a href="categoria.php">Categoria</a></li>
                <li><a href="perfil.php">Perfil</a></li>
                <li><a href="suporte.php">Suporte</a></li>
                <li><a href="../XAMP/logout.php">SAIR</a></li>
            <?php } ?>
        </ul>
    </nav>

    <section class="profile">

        <div class="profile-header">
            <img src="../<?php echo $usuario["foto"]; ?>" class="profile-img">

            <div class="profile-info-main">
                <h1><?php echo htmlspecialchars($nick); ?></h1>
            </div>
            <form method="POST" action="../XAMP/trocarFoto.php" enctype="multipart/form-data">
                <input type="file" name="foto">
                <button type="submit">Trocar foto</button>
            </form>
        </div>

        <div class="profile-content">

            <!-- ATIVIDADE -->
            <div class="activity">

                <div class="activity-header">
                    <h3>Atividade recente</h3>
                </div>

                <?php
                if (mysql_num_rows($resultado_jogos) > 0) {

                    while ($jogo = mysql_fetch_assoc($resultado_jogos)) {
                ?>

                    <div class="activity-card">

                        <div class="game-thumb">
                            <img src="../<?php echo $jogo['foto']; ?>" alt="<?php echo htmlspecialchars($jogo["titulo"]); ?>">
                        </div>

                        <div class="activity-info">
                            <h4><?php echo htmlspecialchars($jogo["titulo"]); ?></h4>
                            <p><?php echo htmlspecialchars($jogo["genero"]); ?></p>
                        </div>

                        <a href="telaJogo.php?id=<?php echo $jogo["id_jogo"]; ?>"">
                        <button class="play-btn" type="submit">
                            JOGAR
                        </button>
                        </a>

                    </div>

                <?php
                    }

                } else {
                ?>

                    <div class="sem-jogos">
                        <p>Você ainda não possui jogos na biblioteca.</p>
                    </div>

                <?php
                }
                ?>

            </div>

            <!-- LATERAL -->
            <div class="profile-side">

                <p class="status">🟢 Online</p>

                <div class="side-box">
                    <p>🎮 Jogos</p>
                    <span><?php echo $total_jogos; ?></span>
                </div>

                <div class="side-box">
                    <p>🏆 Insígnias</p>
                    <span>5</span>
                </div>

                <div class="side-box">
                    <p>📸 Capturas</p>
                    <span>1</span>
                </div>

            </div>

        </div>
    </section>

    <footer>
        <p>© 2026 - Ghost Gamer</p>
    </footer>

    <script src="../ASSETS/JS/perfil.js"></script>

</body>
</html>
