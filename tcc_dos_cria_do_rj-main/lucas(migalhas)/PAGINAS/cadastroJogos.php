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
    <link rel="stylesheet" href="../ASSETS/CSS/cadastroCliente.css">
    <title>Cadastro</title>
</head>

<body>
    <button id="menu-btn">☰</button>

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
    <div class="container">
        <div class="logo-container">
            <img src="../ASSETS/IMG/logo.png" alt="Ghost Gamer" class="logo-img">
            <span class="logo-text"><a href="../index.php">GHOST GAMER</a></span>
        </div>
        <!-- Apenas Cadastro Form - Centralizado -->
        <div class="cadastro-wrapper">
            <div class="form-box cadastro-box">
                <h2>CADASTRO</h2>
                <form method="post" action="../XAMP/gravarcad.php">
                    <div class="input-group">
                        <label>Titulo do Jogo</label>
                        <input type="text" name="titulo" placeholder="Digite Nome do Jogo">
                    </div>
                    <div class="input-group">
                        <label>Email da Empresa</label>
                        <select required class="input-genero">
                        <?php 
                        error_reporting(0);

                        mysql_connect("localhost", "root", "");
                        mysql_select_db("ghost_gamer");
                        $sql_em = "SELECT DISTINCT email FROM empresa ORDER BY email";
                        $result_email = mysql_query($sql_em);

                        while ($linha = mysql_fetch_assoc($result_email)) {

                            $selecionado = ($email == $linha['email']) ? "selected" : "";

                            echo "
                                <option value='" . htmlspecialchars($linha['email']) . "' $selecionado>
                                    " . htmlspecialchars($linha['email']) . "
                                </option>
                            ";
                        }

                        ?>
                        </select>
                    </div>
                    <div class="input-group">
                        <label>Gênero</label>
                        <select name="genero" required class="input-genero">
                            <option value="" disabled selected>Selecione o gênero do jogo</option>
                            <option value="Ação">Ação</option>
                            <option value="Aventura">Aventura</option>
                            <option value="RPG">RPG</option>
                            <option value="Estratégia">Estratégia</option>
                            <option value="Simulação">Simulação</option>
                            <option value="Esportes">Esportes</option>
                            <option value="Corrida">Corrida</option>
                            <option value="Luta">Luta</option>
                            <option value="Terror">Terror</option>
                            <option value="Sobrevivência">Sobrevivência</option>
                            <option value="Plataforma">Plataforma</option>
                            <option value="Puzzle">Puzzle</option>
                            <option value="Tiro">Tiro</option>
                            <option value="Battle Royale">Battle Royale</option>
                            <option value="MMORPG">MMORPG</option>
                            <option value="MOBA">MOBA</option>
                            <option value="Musical">Musical</option>
                            <option value="Indie">Indie</option>
                        </select>
                    </div>

                    <div class="input-group">
                        <label>Núcleos</label>
                        <input type="text" name="nucleos" placeholder="Digite a Quantidade de Núcleos">
                    </div>

                    <div class="input-group">
                        <label>Threads</label>
                        <input type="text" name="threads" placeholder="Digite a Quantidade de Threas">
                    </div>
                    <div class="input-group">
                        <label>Frequência</label>
                        <input type="text" name="frequencia" placeholder="Digite a Frequencia do CPU">
                    </div>
                    <div class="input-group">
                        <label>Memoria Ram</label>
                        <input type="text" name="ram_gb" placeholder="Digite a Quantidade de Memoria Ram">
                    </div>
                    <div class="input-group">
                        <label>Vram </label>
                        <input type="text" name="vram_gb" placeholder="Digite a Quantidade de VRAM">
                    </div>
                    <div class="input-group">
                        <label>Armazenamento</label>
                        <input type="text" name="armazenamento" placeholder="Digite a Quantidade de Armazenamento">
                    </div>
                    <button type="submit" class="btn-cadastro">CADASTRAR JOGOS</button>

                </form>
            </div>
        </div>
    </div>

    <script src="../ASSETS/JS/index.js"></script>
</body>

</html>
