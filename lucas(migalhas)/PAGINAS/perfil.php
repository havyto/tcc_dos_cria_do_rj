<?php
session_start();

// pega tipo do usuário
$tipo = isset($_SESSION["administrador"]) ? $_SESSION["administrador"] : "usuario";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ghost Gamer - Home</title>
    <link rel="stylesheet" href="../ASSETS/CSS/perfil.css">
</head>
<body>

    <!-- HEADER -->
    <header class="header">
        <div class="logo-container">
            <img src="../ASSETS/IMG/logo.png.png" alt="Ghost Gamer" class="logo-img">
            <span class="logo-text"><a href="index.php">GHOST GAMER</a></span>
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
            <li><a href="loginCliente.html">Login</a></li>
            <li><a href="cadastroCliente.html">Cadastro</a></li>
            <li><a href="../XAMP/logout.php">SAIR</a></li>

        </ul>
    </nav>

    <section class="profile">

    <div class="profile-header">
        <img src="../ASSETS/IMG/FotoPerfil.jpg" class="profile-img">

        <div class="profile-info-main">
            <h1>Usuario</h1>
        </div>

        
    </div>

    <div class="profile-content">

        <!-- ATIVIDADE -->
        <div class="activity">

            <div class="activity-header">
                <h3>Atividade recente</h3>
              
            </div>

            <div class="activity-card">
                <div class="game-thumb"></div>

                <div class="activity-info">
                    <h4>Joguinho Zika 1</h4>
                </div>
                <div class="achievements">
                    <div class="achievements-top">
                        <span>Conquistas: 85 de 137</span>
                    </div>

                    <div class="progress-bar">
                        <div class="progress"></div>
                    </div>

                    <div class="achievements-icons">
                        <div class="ach-icon"></div>
                        <div class="ach-icon"></div>
                        <div class="ach-icon"></div>
                        <div class="ach-icon"></div>
                        <div class="ach-icon more">+80</div>
                    </div>
                </div>
                <button class="play-btn">JOGAR</button>
            </div>

            <div class="activity-card">
                <div class="game-thumb"></div>

                <div class="activity-info">
                    <h4>Joguinho Zika 2</h4>
                </div>
                <div class="achievements">
                    <div class="achievements-top">
                        <span>Conquistas: 61 de 67</span>
                    </div>

                    <div class="progress-bar">
                        <div class="progress"></div>
                    </div>

                    <div class="achievements-icons">
                        <div class="ach-icon"></div>
                        <div class="ach-icon"></div>
                        <div class="ach-icon"></div>
                        <div class="ach-icon"></div>
                        <div class="ach-icon more">+60</div>
                    </div>
                </div>
                <button class="play-btn">JOGAR</button>
            </div>

        </div>

        <!-- LATERAL -->
        <div class="profile-side">

            <p class="status">🟢 Online</p>

            <div class="side-box">
                <p>🎮 Jogos</p>
                <span>13</span>
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
