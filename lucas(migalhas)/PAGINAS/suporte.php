<?php
session_start();

// pega tipo do usuário
$tipo = isset($_SESSION["administrador"]) ? $_SESSION["administrador"] : "usuario";

// Variáveis do header
$base = "../";
$pagina = "suporte";
$busca = true;
$busca_texto = "Buscar nas perguntas...";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ghost Gamer - Suporte</title>
    <link rel="stylesheet" href="../ASSETS/CSS/ghost.css">
    <link rel="stylesheet" href="../ASSETS/CSS/suporte.css">
</head>
<body>

    <?php include "../INCLUDES/header.php"; ?>

    <main class="container suporte">

        <section class="cabecalho-pagina">
            <h1>Central de suporte</h1>
            <p>Estamos aqui para ajudar você a aproveitar o Ghost Gamer ao máximo.</p>
        </section>

        <!-- ATALHOS -->
        <section class="secao suporteContent" data-secao>
            <ul class="msuporte">
                <li>
                    <a href="../index.php#jogos" class="suporte-card">
                        <span class="ico ico-controle" aria-hidden="true"></span>
                        <strong>Jogos</strong>
                        <span>Veja os jogos disponíveis no catálogo.</span>
                    </a>
                </li>
                <li>
                    <a href="#perguntas" class="suporte-card">
                        <span class="ico ico-cpu" aria-hidden="true"></span>
                        <strong>Comparação de requisitos</strong>
                        <span>Entenda os requisitos e como compará-los.</span>
                    </a>
                </li>
                <li>
                    <a href="perfil.php" class="suporte-card">
                        <span class="ico ico-usuario" aria-hidden="true"></span>
                        <strong>Minha conta</strong>
                        <span>Seu perfil, sua foto e sua biblioteca.</span>
                    </a>
                </li>
            </ul>
        </section>

        <!-- PERGUNTAS FREQUENTES -->
        <section class="secao" id="perguntas" data-secao>
            <div class="titulo-secao">
                <h2>Perguntas frequentes</h2>
            </div>

            <div class="faq">
                <details class="faq-item" data-titulo="Como adiciono um jogo à minha biblioteca? biblioteca adicionar">
                    <summary>Como adiciono um jogo à minha biblioteca?</summary>
                    <p>Abra a página do jogo e clique em <strong>Adicionar à biblioteca</strong> (é preciso estar logado). Os jogos adicionados aparecem em Biblioteca e na sua atividade recente no Perfil.</p>
                </details>

                <details class="faq-item" data-titulo="O que significam os requisitos mínimos? processador ram vram armazenamento">
                    <summary>O que significam os requisitos mínimos?</summary>
                    <p>São os valores de hardware mais simples com os quais o jogo foi pensado para funcionar: processador (núcleos, threads e frequência), memória RAM, memória de vídeo (VRAM) e espaço de armazenamento.</p>
                </details>

                <details class="faq-item" data-titulo="Atender aos requisitos mínimos garante bom desempenho? comparação computador">
                    <summary>Atender aos requisitos mínimos garante bom desempenho?</summary>
                    <p>Não. Os requisitos mínimos não garantem 100% de desempenho, fluidez ou qualidade gráfica. Compare cada item com as especificações do seu computador e, quanto mais você superar esses valores, melhor tende a ser a experiência.</p>
                </details>

                <details class="faq-item" data-titulo="Como troco minha foto de perfil? conta foto">
                    <summary>Como troco minha foto de perfil?</summary>
                    <p>Acesse <strong>Perfil</strong>, escolha uma imagem no campo de foto e clique em <strong>Trocar foto</strong>.</p>
                </details>

                <details class="faq-item" data-titulo="Esqueci minha senha. O que fazer? login conta senha">
                    <summary>Esqueci minha senha. O que faço?</summary>
                    <p>Na tela de login, use o link <strong>Esqueci minha senha</strong>.</p>
                </details>
            </div>

            <div id="semResultado" class="estado-vazio" hidden>
                <p>Nenhuma pergunta encontrada para essa busca.</p>
            </div>
        </section>

        <!-- FALE CONOSCO -->
        <!-- TODO: o funcionamento do "Fale conosco" será adicionado futuramente.
             Por enquanto este bloco é apenas visual (o botão ainda não leva a lugar nenhum). -->
        <section class="secao">
            <div class="painel fale-conosco">
                <p>Não encontrou o que procurava?</p>
                <a href="#" class="btn btn-primario">Fale conosco</a>
            </div>
        </section>

    </main>

    <?php include "../INCLUDES/footer.php"; ?>

    <script src="../ASSETS/JS/index.js"></script>
    <script src="../ASSETS/JS/ghost.js"></script>

</body>
</html>
