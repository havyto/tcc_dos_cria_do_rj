<?php
session_start();
error_reporting(E_ALL & ~E_DEPRECATED);

mysql_connect("localhost", "root", "");
mysql_select_db("ghost_gamer");

$tipo = isset($_SESSION["administrador"]) ? $_SESSION["administrador"] : "usuario";

if (!isset($_SESSION["id"])) {
    die("Você precisa estar logado para acessar sua biblioteca.");
}

include "../INCLUDES/funcoes.php";

$id_cliente = mysql_real_escape_string($_SESSION["id"]);

$sql = "SELECT jogo.*
        FROM biblioteca
        INNER JOIN jogo ON biblioteca.id_jogo = jogo.id_jogo
        WHERE biblioteca.id_cliente = '$id_cliente'
        ORDER BY biblioteca.data_adicionado DESC";

$resultado = mysql_query($sql);
$total_jogos = mysql_num_rows($resultado);

// jogo adicionado mais recentemente
$sql_recente = "SELECT jogo.* FROM biblioteca INNER JOIN jogo ON biblioteca.id_jogo = jogo.id_jogo
WHERE biblioteca.id_cliente = '$id_cliente'ORDER BY biblioteca.data_adicionado DESC LIMIT 1";

$resultado_recente = mysql_query($sql_recente);
$recente = mysql_fetch_assoc($resultado_recente); // false quando a biblioteca está vazia

// Variáveis do header
$base = "../";
$pagina = "biblioteca";
$busca = true;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ASSETS/CSS/ghost.css">
    <link rel="stylesheet" href="../ASSETS/CSS/biblioteca.css?v=3">
    <title>Minha biblioteca - Ghost Gamer</title>
</head>
<body>

<?php include "../INCLUDES/header.php"; ?>

<main class="container biblioteca">

    <section class="cabecalho-pagina">
        <h1>Minha biblioteca</h1>
        <p>
            <?php echo $total_jogos; ?>
            <?php if ($total_jogos == 1) { echo "jogo na sua coleção"; } else { echo "jogos na sua coleção"; } ?>
        </p>
    </section>

    <?php if ($total_jogos == 0) { ?>

        <!-- BIBLIOTECA VAZIA -->
        <section class="secao">
            <div class="estado-vazio">
                <span class="ico ico-biblioteca" aria-hidden="true"></span>
                <p>Você ainda não possui jogos na biblioteca.</p>
                <a class="btn btn-primario" href="categoria.php">Explorar jogos</a>
            </div>
        </section>

    <?php } else { ?>

        <!-- JOGOS RECENTES -->
        <section class="secao recentes" data-secao>
            <div class="titulo-secao">
                <h2>Jogos recentes</h2>
            </div>

            <a class="lista-item lista-destaque" href="telaJogo.php?id=<?php echo $recente["id_jogo"]; ?>" data-titulo="<?php echo htmlspecialchars($recente["titulo"]); ?>" data-genero="<?php echo htmlspecialchars($recente["genero"]); ?>">
                <div class="lista-thumb">
                    <img src="../<?php echo ghost_foto($recente["foto"]); ?>" alt="Capa de <?php echo htmlspecialchars($recente["titulo"]); ?>">
                </div>
                <div class="lista-info">
                    <span class="badge">Adicionado por último</span>
                    <h3><?php echo htmlspecialchars($recente["titulo"]); ?></h3>
                    <p><?php echo htmlspecialchars($recente["genero"]); ?></p>
                </div>
                <span class="btn btn-primario btn-pequeno"><span class="ico ico-play" aria-hidden="true"></span>Ver jogo</span>
            </a>
        </section>

        <!-- TODOS OS JOGOS -->
        <section class="secao" data-secao>
            <div class="titulo-secao">
                <h2>Todos os jogos</h2>
            </div>

            <div class="lista-biblioteca">
                <?php while ($jogo = mysql_fetch_assoc($resultado)) { ?>

                    <a class="lista-item" href="telaJogo.php?id=<?php echo $jogo["id_jogo"]; ?>" data-titulo="<?php echo htmlspecialchars($jogo["titulo"]); ?>" data-genero="<?php echo htmlspecialchars($jogo["genero"]); ?>">
                        <div class="lista-thumb">
                            <img src="../<?php echo ghost_foto($jogo["foto"]); ?>" alt="Capa de <?php echo htmlspecialchars($jogo["titulo"]); ?>" loading="lazy">
                        </div>
                        <div class="lista-info">
                            <h3><?php echo htmlspecialchars($jogo["titulo"]); ?></h3>
                            <p><?php echo htmlspecialchars($jogo["genero"]); ?></p>
                        </div>
                        <span class="btn btn-pequeno">Ver jogo</span>
                    </a>

                <?php } ?>
            </div>
        </section>

        <div class="secao" id="semResultado" hidden>
            <div class="estado-vazio">
                <span class="ico ico-busca" aria-hidden="true"></span>
                <p>Nenhum jogo da sua biblioteca combina com essa busca.</p>
            </div>
        </div>

    <?php } ?>

</main>

<?php include "../INCLUDES/footer.php"; ?>

<script src="../ASSETS/JS/biblioteca.js"></script>
<script src="../ASSETS/JS/ghost.js"></script>
</body>
</html>
