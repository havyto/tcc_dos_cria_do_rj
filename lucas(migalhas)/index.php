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

/* ---------- DADOS DA HOME (só leitura) ---------- */
include "INCLUDES/funcoes.php";

// Jogo em destaque: o mais recente que tem foto (se nenhum tiver, o mais recente)
$res_destaque = mysql_query("SELECT * FROM jogo WHERE foto IS NOT NULL AND foto <> '' ORDER BY id_jogo DESC LIMIT 1");
if (mysql_num_rows($res_destaque) == 0) {
    $res_destaque = mysql_query("SELECT * FROM jogo ORDER BY id_jogo DESC LIMIT 1");
}
$destaque = mysql_fetch_assoc($res_destaque); // false quando não há jogos

// Gêneros que existem no catálogo
$res_generos = mysql_query("SELECT DISTINCT genero FROM jogo WHERE genero IS NOT NULL AND genero <> '' ORDER BY genero");

// Todos os jogos, do mais novo para o mais antigo
$res_jogos = mysql_query("SELECT * FROM jogo ORDER BY id_jogo DESC");
$total_jogos = mysql_num_rows($res_jogos);

// Variáveis do header
$base = "";
$pagina = "home";
$busca = true;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ghost Gamer - Home</title>
    <link rel="stylesheet" href="ASSETS/CSS/ghost.css">
    <link rel="stylesheet" href="ASSETS/CSS/index.css">
</head>
<body>

    <?php include "INCLUDES/header.php"; ?>

    <main>

        <!-- HERO: jogo em destaque -->
        <?php if ($destaque) { ?>
        <section class="hero">
            <div class="hero-fundo" aria-hidden="true">
                <img src="<?php echo ghost_foto($destaque["foto"]); ?>" alt="">
            </div>

            <div class="container hero-conteudo">
                <div class="hero-texto">
                    <span class="badge badge-borda">Em destaque</span>
                    <h1><?php echo htmlspecialchars($destaque["titulo"]); ?></h1>

                    <div class="hero-meta">
                        <span class="chip"><?php echo htmlspecialchars($destaque["genero"]); ?></span>
                        <?php if (!empty($destaque["ram_gb"])) { ?>
                            <span class="chip"><?php echo $destaque["ram_gb"]; ?> GB RAM</span>
                        <?php } ?>
                        <?php if (!empty($destaque["vram_gb"])) { ?>
                            <span class="chip"><?php echo $destaque["vram_gb"]; ?> GB VRAM</span>
                        <?php } ?>
                    </div>

                    <p class="hero-desc">
                        <?php echo htmlspecialchars($destaque["titulo"]); ?> é um jogo do gênero
                        <?php echo htmlspecialchars($destaque["genero"]); ?>.
                        Confira os requisitos e veja se ele combina com o seu computador.
                    </p>

                    <div class="hero-acoes">
                        <a class="btn btn-primario" href="PAGINAS/telaJogo.php?id=<?php echo $destaque["id_jogo"]; ?>"><span class="ico ico-play" aria-hidden="true"></span>Ver jogo</a>
                        <a class="btn" href="PAGINAS/categoria.php">Explorar categorias</a>
                    </div>
                </div>

                <a class="hero-capa" href="PAGINAS/telaJogo.php?id=<?php echo $destaque["id_jogo"]; ?>" aria-label="Abrir <?php echo htmlspecialchars($destaque["titulo"]); ?>">
                    <img src="<?php echo ghost_foto($destaque["foto"]); ?>" alt="Capa de <?php echo htmlspecialchars($destaque["titulo"]); ?>">
                </a>
            </div>
        </section>
        <?php } else { ?>
        <section class="hero hero-simples">
            <div class="container hero-conteudo">
                <div class="hero-texto">
                    <h1>Ghost Gamer</h1>
                    <p class="hero-desc">Seus jogos favoritos em um só lugar.</p>
                </div>
            </div>
        </section>
        <?php } ?>

        <!-- CATEGORIAS -->
        <section class="container secao" id="categorias" data-secao>
            <div class="titulo-secao">
                <h2>Categorias</h2>
                <p>Escolha seu gênero favorito</p>
            </div>

            <div class="categorias-grade">
                <?php while ($g = mysql_fetch_assoc($res_generos)) { ?>
                    <a class="categoria-tile" href="PAGINAS/categoria.php?genero=<?php echo urlencode($g["genero"]); ?>" data-titulo="<?php echo htmlspecialchars($g["genero"]); ?>">
                        <span class="ico <?php echo ghost_icone_genero($g["genero"]); ?>" aria-hidden="true"></span>
                        <span class="categoria-nome"><?php echo htmlspecialchars($g["genero"]); ?></span>
                    </a>
                <?php } ?>
            </div>
        </section>

        <!-- JOGOS -->
        <section class="container secao" id="jogos" data-secao>
            <div class="titulo-secao">
                <h2>Jogos disponíveis</h2>
                <p>Seus jogos favoritos em um só lugar</p>
            </div>

            <?php if ($total_jogos > 0) { ?>
                <div class="grid-jogos">
                    <?php while ($jogo = mysql_fetch_assoc($res_jogos)) { ?>
                        <a class="jogo-card" href="PAGINAS/telaJogo.php?id=<?php echo $jogo["id_jogo"]; ?>" data-titulo="<?php echo htmlspecialchars($jogo["titulo"]); ?>" data-genero="<?php echo htmlspecialchars($jogo["genero"]); ?>">
                            <div class="jogo-capa">
                                <img src="<?php echo ghost_foto($jogo["foto"]); ?>" alt="Capa de <?php echo htmlspecialchars($jogo["titulo"]); ?>" loading="lazy">
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
            <?php } else { ?>
                <div class="estado-vazio">
                    <span class="ico ico-controle" aria-hidden="true"></span>
                    <p>Nenhum jogo cadastrado ainda.</p>
                </div>
            <?php } ?>
        </section>

        <div class="container secao" id="semResultado" hidden>
            <div class="estado-vazio">
                <span class="ico ico-busca" aria-hidden="true"></span>
                <p>Nenhum jogo ou categoria encontrado para essa busca.</p>
            </div>
        </div>

    </main>

    <?php include "INCLUDES/footer.php"; ?>

    <script src="ASSETS/JS/index.js"></script>
    <script src="ASSETS/JS/ghost.js"></script>

</body>
</html>
