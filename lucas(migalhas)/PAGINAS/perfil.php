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

include "../INCLUDES/funcoes.php";

// foto do usuário (usa a imagem padrão se o banco estiver sem foto)
$foto_perfil = "ASSETS/IMG/FotoPerfilPadrao.jpg";
if (!empty($usuario["foto"])) {
    $foto_perfil = $usuario["foto"];
}

// Variáveis do header
$base = "../";
$pagina = "perfil";
$busca = true;
$busca_texto = "Buscar na atividade...";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ghost Gamer - Perfil</title>
    <link rel="stylesheet" href="../ASSETS/CSS/ghost.css">
    <link rel="stylesheet" href="../ASSETS/CSS/perfil.css">
</head>
<body>

    <?php include "../INCLUDES/header.php"; ?>

    <main class="container profile">

        <!-- CABEÇALHO DO PERFIL -->
        <section class="profile-header">
            <img src="../<?php echo $foto_perfil; ?>" class="profile-img" alt="Foto de <?php echo htmlspecialchars($nick); ?>">

            <div class="profile-info-main">
                <h1><?php echo htmlspecialchars($nick); ?></h1>
                <p class="profile-nome"><?php echo htmlspecialchars($nome); ?></p>
                <p class="profile-email"><?php echo htmlspecialchars($email); ?></p>
                <?php if ($tipo === "admin") { ?>
                    <span class="badge">Administrador</span>
                <?php } ?>
            </div>

            <form class="profile-foto" method="POST" action="../XAMP/trocarFoto.php" enctype="multipart/form-data">
                <label for="foto">Trocar foto de perfil</label>
                <input type="file" name="foto" id="foto">
                <button type="submit" class="btn btn-pequeno">Trocar foto</button>
            </form>
        </section>

        <div class="profile-content">

            <!-- ATIVIDADE -->
            <div class="activity" data-secao>

                <div class="activity-header">
                    <h3>Atividade recente</h3>
                </div>

                <?php
                if (mysql_num_rows($resultado_jogos) > 0) {

                    while ($jogo = mysql_fetch_assoc($resultado_jogos)) {
                ?>

                    <div class="activity-card" data-titulo="<?php echo htmlspecialchars($jogo["titulo"]); ?>" data-genero="<?php echo htmlspecialchars($jogo["genero"]); ?>">

                        <div class="game-thumb">
                            <img src="../<?php echo ghost_foto($jogo["foto"]); ?>" alt="<?php echo htmlspecialchars($jogo["titulo"]); ?>">
                        </div>

                        <div class="activity-info">
                            <h4><?php echo htmlspecialchars($jogo["titulo"]); ?></h4>
                            <p><?php echo htmlspecialchars($jogo["genero"]); ?></p>
                        </div>

                        <a class="play-btn btn btn-primario btn-pequeno" href="telaJogo.php?id=<?php echo $jogo["id_jogo"]; ?>">
                            <span class="ico ico-play" aria-hidden="true"></span>Ver jogo
                        </a>

                    </div>

                <?php
                    }

                } else {
                ?>

                    <div class="sem-jogos estado-vazio">
                        <span class="ico ico-controle" aria-hidden="true"></span>
                        <p>Você ainda não possui jogos na biblioteca.</p>
                        <a class="btn btn-primario btn-pequeno" href="categoria.php">Explorar jogos</a>
                    </div>

                <?php
                }
                ?>

                <div id="semResultado" class="estado-vazio" hidden>
                    <p>Nenhuma atividade encontrada para essa busca.</p>
                </div>

            </div>

            <!-- LATERAL -->
            <aside class="profile-side">

                <p class="status"><span class="status-ponto" aria-hidden="true"></span>Online</p>

                <div class="side-box">
                    <p><span class="ico ico-controle" aria-hidden="true"></span>Jogos</p>
                    <span><?php echo $total_jogos; ?></span>
                </div>

                <div class="side-box">
                    <p><span class="ico ico-trofeu" aria-hidden="true"></span>Insígnias</p>
                    <span>5</span>
                </div>

                <div class="side-box">
                    <p><span class="ico ico-camera" aria-hidden="true"></span>Capturas</p>
                    <span>1</span>
                </div>

            </aside>

        </div>
    </main>

    <?php include "../INCLUDES/footer.php"; ?>

    <script src="../ASSETS/JS/perfil.js"></script>
    <script src="../ASSETS/JS/ghost.js"></script>

</body>
</html>
