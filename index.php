<?php
require_once __DIR__ . "/PAGINAS/parciais/bootstrap.php";
$base = "";
$paginaAtual = "index.php";

// Jogos em destaque (os cadastrados no banco, se houver; senão exemplos)
$jogosDestaque = conectarBanco()
    ->query("SELECT id_jogo, titulo, foto, genero FROM jogo ORDER BY id_jogo DESC LIMIT 6")
    ->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ghost Gamer - Home</title>
    <link rel="stylesheet" href="ASSETS/CSS/global.css">
    <link rel="stylesheet" href="ASSETS/CSS/index.css">
</head>
<body>

    <?php include __DIR__ . "/PAGINAS/parciais/nav.php"; ?>

    <!-- HERO -->
    <section class="hero">
        <div class="hero-content">
            <h2>Bem-vindo ao</h2>
            <h1>GHOST GAMER</h1>
            <p>Seus jogos favoritos em um só lugar</p>
            <a href="PAGINAS/telaJogo.php" class="btn btn-primary btn-download">BAIXAR AGORA</a>
        </div>
    </section>

    <!-- JOGOS -->
    <section class="games-section container">
        <h2 class="section-title">JOGOS EM DESTAQUE</h2>

        <div class="games-grid">
            <?php if (empty($jogosDestaque)): ?>
                <div class="game-card">
                    <h3>Valorant</h3>
                    <p>FPS tático</p>
                    <a href="PAGINAS/telaJogo.php" class="btn btn-primary btn-block">JOGAR</a>
                </div>
                <div class="game-card">
                    <h3>League of Legends</h3>
                    <p>MOBA</p>
                    <a href="PAGINAS/telaJogo.php" class="btn btn-primary btn-block">JOGAR</a>
                </div>
                <div class="game-card">
                    <h3>CS:GO</h3>
                    <p>FPS competitivo</p>
                    <a href="PAGINAS/telaJogo.php" class="btn btn-primary btn-block">JOGAR</a>
                </div>
            <?php else: ?>
                <?php foreach ($jogosDestaque as $jogo): ?>
                    <div class="game-card">
                        <div class="game-card-thumb"
                            <?php if ($jogo["foto"]): ?>
                                style="background-image:url('<?= htmlspecialchars($jogo["foto"]) ?>')"
                            <?php endif; ?>
                        ></div>
                        <h3><?= htmlspecialchars($jogo["titulo"]) ?></h3>
                        <p><?= htmlspecialchars($jogo["genero"] ?: "Jogo") ?></p>
                        <a href="PAGINAS/telaJogo.php?id=<?= (int) $jogo["id_jogo"] ?>" class="btn btn-primary btn-block">JOGAR</a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>

    <?php $base = ""; include __DIR__ . "/PAGINAS/parciais/footer.php"; ?>

</body>
</html>
