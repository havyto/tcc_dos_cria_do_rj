<?php
session_start();
error_reporting(E_ALL & ~E_DEPRECATED);
mysql_connect("localhost", "root", "");
mysql_select_db("ghost_gamer");
// pega tipo do usuário
$tipo = isset($_SESSION["administrador"]) ? $_SESSION["administrador"] : "usuario";
if (!isset($_GET["id"])) { die("Jogo não encontrado."); } 
    $id_jogo = mysql_real_escape_string($_GET["id"]);
    $sql = "SELECT * FROM jogo WHERE id_jogo = '$id_jogo'";

    $resultado = mysql_query($sql);

    $jogo = mysql_fetch_assoc($resultado); 
    if (!$jogo) { die("Jogo não encontrado."); }
    $titulo = $jogo["titulo"]; 
    $empresa_email = $jogo["empresa_email"]; 
    $genero = $jogo["genero"]; 
    $nucleos = $jogo["nucleos"]; 
    $threads = $jogo["threads"]; 
    $frequencia = $jogo["frequencia"]; 
    $ram_gb = $jogo["ram_gb"]; 
    $vram_gb = $jogo["vram_gb"]; 
    $armazenamento = $jogo["armazenamento"];

// mensagem enviada pelo adicionarBiblioteca.php (adicionado / ja_adicionado)
$mensagem = isset($_GET["mensagem"]) ? $_GET["mensagem"] : "";

include "../INCLUDES/funcoes.php";

// Variáveis do header
$base = "../";
$pagina = "jogo";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($titulo); ?> - Ghost Gamer</title>
    <link rel="stylesheet" href="../ASSETS/CSS/ghost.css">
    <link rel="stylesheet" href="../ASSETS/CSS/telajogo.css?v=3">
</head>
<body>

    <?php include "../INCLUDES/header.php"; ?>

    <!-- cenário: a capa do jogo desfocada -->
    <div class="jogo-fundo" aria-hidden="true">
        <img src="../<?php echo ghost_foto($jogo["foto"]); ?>" alt="">
    </div>

        <main class="container container-jogo">

            <?php if ($mensagem == "adicionado") { ?>
                <div class="aviso aviso-ok" role="status">
                    <span class="ico ico-check" aria-hidden="true"></span>
                    <p>Jogo adicionado à sua biblioteca.</p>
                </div>
            <?php } ?>
            <?php if ($mensagem == "ja_adicionado") { ?>
                <div class="aviso" role="status">
                    <span class="ico ico-info" aria-hidden="true"></span>
                    <p>Este jogo já está na sua biblioteca.</p>
                </div>
            <?php } ?>

            <section class="topo-jogo">
                <div class="imagem-jogo">
                    <img src="../<?php echo ghost_foto($jogo["foto"]); ?>" alt="Capa de <?php echo htmlspecialchars($jogo["titulo"]); ?>">
                </div>
                <div class="informacoes-jogo">
                    <a class="genero-jogo" href="categoria.php?genero=<?php echo urlencode($genero); ?>">
                        <?php echo htmlspecialchars($genero); ?>
                    </a>
                    <h1>
                        <?php echo htmlspecialchars($titulo); ?>
                    </h1>
                    <p class="empresa-jogo">
                        Desenvolvedor:
                        <strong><?php if (!empty($empresa_email)) { echo htmlspecialchars($empresa_email); } else { echo "Não informado"; } ?></strong>
                    </p>
                    <div class="acoes-jogo">
                        <form method="POST" action="../XAMP/adicionarBiblioteca.php">
                        <input type="hidden" name="id_jogo" value="<?php echo $id_jogo; ?>">
                        <button type="submit" class="btn btn-primario"><span class="ico ico-mais" aria-hidden="true"></span>Adicionar à biblioteca</button>
                        </form>

                        <a href="#" class="btn">
                            <span class="ico ico-coracao" aria-hidden="true"></span>Favoritar
                        </a>
                    </div>
                </div>
            </section>

            <section class="meio-jogo">
                <div class="descricao-jogo painel">
                    <h2>
                        Descrição do jogo
                    </h2>
                    <p>
                        <?php echo htmlspecialchars($titulo); ?>
                        é um jogo do gênero
                        <?php echo htmlspecialchars($genero); ?>.
                    </p>
                    <p>
                        Para obter mais informações sobre o jogo,
                        consulte os requisitos mínimos apresentados
                        abaixo.
                    </p>
                </div>
                <div class="idiomas-jogo painel">
                    <h3>
                        Informações
                    </h3>
                    <dl class="info-lista">
                        <div>
                            <dt>Gênero</dt>
                            <dd><?php echo htmlspecialchars($genero); ?></dd>
                        </div>
                        <div>
                            <dt>Empresa</dt>
                            <dd><?php if (!empty($empresa_email)) { echo htmlspecialchars($empresa_email); } else { echo "Não informado"; } ?></dd>
                        </div>
                    </dl>
                </div>
            </section>

            <section class="requisitos-jogo">
                <div class="titulo-secao">
                    <h2>
                        Requisitos para jogar
                    </h2>
                    <p>Compare cada item com as especificações do seu computador.</p>
                </div>

                <div class="requisitos-grid">
                    <div class="requisito">
                        <span class="ico ico-cpu" aria-hidden="true"></span>
                        <strong>
                            Processador
                        </strong>
                        <span class="valor"><?php echo $nucleos; ?> núcleos</span>
                        <span class="detalhe"><?php echo $threads; ?> threads</span>
                    </div>
                    <div class="requisito">
                        <span class="ico ico-relogio" aria-hidden="true"></span>
                        <strong>
                            Frequência
                        </strong>
                        <span class="valor"><?php echo $frequencia; ?> GHz</span>
                    </div>
                    <div class="requisito">
                        <span class="ico ico-ram" aria-hidden="true"></span>
                        <strong>
                            Memória RAM
                        </strong>
                        <span class="valor"><?php echo $ram_gb; ?> GB</span>
                    </div>
                    <div class="requisito">
                        <span class="ico ico-monitor" aria-hidden="true"></span>
                        <strong>
                            Memória de vídeo
                        </strong>
                        <span class="valor"><?php echo $vram_gb; ?> GB</span>
                        <span class="detalhe">VRAM</span>
                    </div>
                    <div class="requisito">
                        <span class="ico ico-disco" aria-hidden="true"></span>
                        <strong>
                            Armazenamento
                        </strong>
                        <span class="valor"><?php echo $armazenamento; ?> GB</span>
                        <span class="detalhe">espaço livre</span>
                    </div>
                </div>

                <div class="aviso aviso-atencao aviso-requisitos">
                    <span class="ico ico-alerta" aria-hidden="true"></span>
                    <p>
                        <strong>Requisitos mínimos não garantem desempenho.</strong>
                        Eles indicam o hardware mais simples com o qual o jogo foi pensado para funcionar.
                        Atendê-los não significa 100% de fluidez nem a melhor qualidade gráfica.
                        Quanto mais o seu computador superar esses valores, melhor tende a ser a experiência.
                    </p>
                </div>
            </section>
        </main>

    <?php include "../INCLUDES/footer.php"; ?>

    <script src="../ASSETS/JS/telajogo.js"></script>
    <script src="../ASSETS/JS/ghost.js"></script>

</body>
</html>
