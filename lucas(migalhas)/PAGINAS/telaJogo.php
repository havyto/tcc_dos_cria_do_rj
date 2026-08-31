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
    $titulo = $jogo["titulo"]; 
    $empresa_email = $jogo["empresa_email"]; 
    $genero = $jogo["genero"]; 
    $nucleos = $jogo["nucleos"]; 
    $threads = $jogo["threads"]; 
    $frequencia = $jogo["frequencia"]; 
    $ram_gb = $jogo["ram_gb"]; 
    $vram_gb = $jogo["vram_gb"]; 
    $armazenamento = $jogo["armazenamento"];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($titulo); ?> - Ghost Gamer</title>
    <link rel="stylesheet" href="../ASSETS/CSS/telajogo.css">
</head>
<body>

    <!-- HEADER -->
    <header class="header">
        <div class="logo-container">
            <img src="../ASSETS/IMG/logo.png" alt="Ghost Gamer" class="logo-img">
            <span class="logo-text"><a href="../index.php">GHOST GAMER</a></span>
        </div>

        <button id="menu-btn">☰</button>
    </header>

    <!-- MENU LATERAL -->
    <nav id="menu" class="menu">
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="biblioteca.php">Biblioteca</a></li>
            <li><a href="categoria.php">Categoria</a></li>

            <!-- ADMIN ONLY -->
            <?php if ($tipo === "admin") { ?>
                <li><a href="../XAMP/consulta.php">Consulta</a></li>
                <li><a href="../PAGINAS/cadastroEmpresa.php">Cadastro de Empresa</a></li>
                <li><a href="cadastroJogos.php">Cadastro de Jogos</a></li>
            <?php } ?>

            <li><a href="perfil.php">Perfil</a></li>
            <li><a href="suporte.php">Suporte</a></li>
            <li><a href="loginCliente.php">Login</a></li>
            <li><a href="cadastroCliente.php">Cadastro</a></li>
            <li><a href="../XAMP/logout.php">SAIR</a></li>

        </ul>
    </nav>

        <main class="container-jogo">
            <section class="topo-jogo">
                <div class="imagem-jogo">
                    <span>Imagem do jogo</span>

                </div>
                <div class="informacoes-jogo">
                    <h1>
                        <?php echo htmlspecialchars($titulo); ?>
                    </h1>
                    <p class="genero-jogo">
                        <?php echo htmlspecialchars($genero); ?>
                    </p>
                    <p class="empresa-jogo">
                        Desenvolvedor:
                        <?php echo htmlspecialchars($empresa_email); ?>
                    </p>
                    <div class="acoes-jogo">
                        <button class="btn-download">
                            BAIXAR AGORA
                        </button>

                        <a href="#">
                            ♡ Favoritar
                        </a>
                    </div>
                </div>
            </section>

            <section class="meio-jogo">
                <div class="descricao-jogo">
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
                <div class="idiomas-jogo">
                    <h3>
                        Informações
                    </h3>
                    <ul>
                        <li>
                            Gênero:
                            <?php echo htmlspecialchars($genero); ?>
                        </li>
                        <li>
                            Empresa:
                            <?php echo htmlspecialchars($empresa_email); ?>
                        </li>
                    </ul>
                </div>
            </section>

            <section class="requisitos-jogo">
                <h2>
                    Requisitos para jogar
                </h2>
                <div class="requisitos-grid">
                    <div class="requisito">
                        <strong>
                            Processador
                        </strong>
                        <span>
                            <?php echo $nucleos; ?>
                            núcleos /
                            <?php echo $threads; ?>
                            threads
                        </span>
                    </div>
                    <div class="requisito">
                        <strong>
                            Frequência
                        </strong>
                        <span>
                            <?php echo $frequencia; ?>
                            GHz
                        </span>
                    </div>
                    <div class="requisito">
                        <strong>
                            Memória RAM
                        </strong>
                        <span>
                            <?php echo $ram_gb; ?>
                            GB
                        </span>
                    </div>
                    <div class="requisito">
                        <strong>
                            Memória de vídeo
                        </strong>
                        <span>
                            <?php echo $vram_gb; ?>
                            GB
                        </span>
                    </div>
                    <div class="requisito">
                        <strong>
                            Armazenamento
                        </strong>
                        <span>
                            <?php echo $armazenamento; ?>
                            GB
                        </span>
                    </div>
                </div>
            </section>
        </main>

    <footer>
        <p>© 2026 - Ghost Gamer</p>
    </footer>

    <script src="../ASSETS/JS/telajogo.js"></script>

</body>
</html>