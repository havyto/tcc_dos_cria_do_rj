<?php
session_start();
error_reporting(E_ALL & ~E_DEPRECATED);
// pega tipo do usuário
$tipo = isset($_SESSION["administrador"]) ? $_SESSION["administrador"] : "usuario";

mysql_connect("localhost", "root", "");
mysql_select_db("ghost_gamer");

include "../INCLUDES/funcoes.php";

// lista de categorias (gêneros que existem no catálogo)
$sql = "SELECT DISTINCT genero from jogo ORDER BY genero ";
$result_categoria = mysql_query($sql);

// se uma categoria foi escolhida, busca os jogos dela
$genero_escolhido = "";
$resultado = false;
$total_jogos = 0;

if (isset($_GET["genero"])) {

    $genero_escolhido = $_GET["genero"];
    $genero = mysql_real_escape_string($_GET["genero"]);

    $sql = "SELECT *
            FROM jogo
            WHERE genero = '$genero'
            ORDER BY titulo";
    $resultado = mysql_query($sql);
    $total_jogos = mysql_num_rows($resultado);
}

// Variáveis do header
$base = "../";
$pagina = "categoria";
$busca = true;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ASSETS/CSS/ghost.css">
    <link rel="stylesheet" href="../ASSETS/CSS/categoria.css">
    <title>Categoria - Ghost Gamer</title>
</head>
<body>

    <?php include "../INCLUDES/header.php"; ?>

    <main class="container">

        <?php if (isset($_GET["genero"])) { ?>

            <!-- JOGOS DA CATEGORIA ESCOLHIDA -->
            <div class="cabecalho-pagina">
                <a class="voltar" href="categoria.php"><span class="ico ico-seta-esq" aria-hidden="true"></span>Todas as categorias</a>
                <h1><?php echo htmlspecialchars($genero_escolhido); ?></h1>
                <p>
                    <?php echo $total_jogos; ?>
                    <?php if ($total_jogos == 1) { echo "jogo disponível"; } else { echo "jogos disponíveis"; } ?>
                    nesta categoria
                </p>
            </div>

            <!-- troca rápida de categoria -->
            <nav class="pills" aria-label="Categorias">
                <?php while ($linha = mysql_fetch_assoc($result_categoria)) { ?>
                    <a class="chip" href="categoria.php?genero=<?php echo urlencode($linha["genero"]); ?>" <?php if ($linha["genero"] == $genero_escolhido) { echo 'aria-current="true"'; } ?>><?php echo htmlspecialchars($linha["genero"]); ?></a>
                <?php } ?>
            </nav>

            <section class="secao categoria-jogos" data-secao>
                <?php if ($total_jogos == 0) { ?>
                    <div class="estado-vazio">
                        <span class="ico ico-controle" aria-hidden="true"></span>
                        <p>Nenhum jogo encontrado nesta categoria.</p>
                        <a class="btn" href="categoria.php">Ver todas as categorias</a>
                    </div>
                <?php } else { ?>
                    <div class="grid-jogos">
                        <?php while ($jogo = mysql_fetch_assoc($resultado)) { ?>
                            <a class="jogo-card" href="telaJogo.php?id=<?php echo $jogo["id_jogo"]; ?>" data-titulo="<?php echo htmlspecialchars($jogo["titulo"]); ?>" data-genero="<?php echo htmlspecialchars($jogo["genero"]); ?>">
                                <div class="jogo-capa">
                                    <img src="../<?php echo ghost_foto($jogo["foto"]); ?>" alt="Capa de <?php echo htmlspecialchars($jogo["titulo"]); ?>" loading="lazy">
                                    <span class="badge badge-borda"><?php echo htmlspecialchars($jogo["genero"]); ?></span>
                                </div>
                                <div class="jogo-info">
                                    <h3 title="<?php echo htmlspecialchars($jogo["titulo"]); ?>"><?php echo htmlspecialchars($jogo["titulo"]); ?></h3>
                                    <div class="jogo-specs">
                                        <?php if (!empty($jogo["ram_gb"])) { ?><span><?php echo $jogo["ram_gb"]; ?> GB RAM</span><?php } ?>
                                        <?php if (!empty($jogo["vram_gb"])) { ?><span><?php echo $jogo["vram_gb"]; ?> GB VRAM</span><?php } ?>
                                    </div>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?>
            </section>

        <?php } else { ?>

            <!-- LISTA DE CATEGORIAS -->
            <div class="cabecalho-pagina">
                <h1>Categorias</h1>
                <p>Escolha um gênero para ver os jogos.</p>
            </div>

            <section class="secao" data-secao>
                <div class="categorias-grade">
                    <?php while ($linha = mysql_fetch_assoc($result_categoria)) { ?>
                        <a class="categoria-tile" href="categoria.php?genero=<?php echo urlencode($linha["genero"]); ?>" data-titulo="<?php echo htmlspecialchars($linha["genero"]); ?>">
                            <span class="ico <?php echo ghost_icone_genero($linha["genero"]); ?>" aria-hidden="true"></span>
                            <span class="categoria-nome"><?php echo htmlspecialchars($linha["genero"]); ?></span>
                        </a>
                    <?php } ?>
                </div>
            </section>

        <?php } ?>

        <div class="secao" id="semResultado" hidden>
            <div class="estado-vazio">
                <span class="ico ico-busca" aria-hidden="true"></span>
                <p>Nada encontrado para essa busca.</p>
            </div>
        </div>

    </main>

    <?php include "../INCLUDES/footer.php"; ?>

    <script src="../ASSETS/JS/categoria.JS"></script>
    <script src="../ASSETS/JS/ghost.js"></script>
</body>
</html>
