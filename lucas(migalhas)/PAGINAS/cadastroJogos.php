<?php
session_start();

// pega tipo do usuário
$tipo = isset($_SESSION["administrador"]) ? $_SESSION["administrador"] : "usuario";

// Variáveis do header
$base = "../";
$pagina = "admin";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ASSETS/CSS/ghost.css">
    <link rel="stylesheet" href="../ASSETS/CSS/cadastroCliente.css">
    <title>Cadastro de Jogos - Ghost Gamer</title>
</head>

<body>

    <?php include "../INCLUDES/header.php"; ?>

    <main class="container">

        <section class="cabecalho-pagina">
            <h1>Cadastro de jogos</h1>
            <p>Preencha as informações do jogo, os requisitos mínimos e envie a capa.</p>
        </section>

        <!-- Apenas Cadastro Form - Centralizado -->
        <div class="cadastro-wrapper">
            <div class="form-box cadastro-box form-largo">
                <form method="post" action="../XAMP/gravarcad.php" enctype="multipart/form-data">

                    <!-- INFORMAÇÕES DO JOGO -->
                    <fieldset class="form-secao">
                        <legend>Informações do jogo</legend>
                        <div class="form-grade">
                            <div class="input-group campo-largo">
                                <label for="titulo">Titulo do Jogo</label>
                                <input type="text" name="titulo" id="titulo" placeholder="Digite Nome do Jogo">
                            </div>
                            <div class="input-group">
                                <label for="empresa_email">Email da Empresa</label>
                                <select name="empresa_email" id="empresa_email" required class="input-genero">
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
                                <label for="genero">Gênero</label>
                                <select name="genero" id="genero" required class="input-genero">
                                    <option value="" disabled selected>Selecione o gênero do jogo</option>
                                    <option value="Ação">Ação</option>
                                    <option value="Aventura">Aventura</option>
                                    <option value="RPG">RPG</option>
                                    <option value="Estratégia">Estratégia</option>
                                    <option value="Simulacao">Simulação</option>
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
                        </div>
                    </fieldset>

                    <!-- REQUISITOS: PROCESSADOR -->
                    <fieldset class="form-secao">
                        <legend>Requisitos mínimos: processador</legend>
                        <div class="form-grade grade-3">
                            <div class="input-group">
                                <label for="nucleos">Núcleos</label>
                                <input type="text" name="nucleos" id="nucleos" inputmode="numeric" placeholder="Digite a Quantidade de Núcleos">
                            </div>
                            <div class="input-group">
                                <label for="threads">Threads</label>
                                <input type="text" name="threads" id="threads" inputmode="numeric" placeholder="Digite a Quantidade de Threas">
                            </div>
                            <div class="input-group">
                                <label for="frequencia">Frequência (GHz)</label>
                                <input type="text" name="frequencia" id="frequencia" inputmode="numeric" placeholder="Digite a Frequencia do CPU">
                            </div>
                        </div>
                    </fieldset>

                    <!-- REQUISITOS: MEMÓRIA E ARMAZENAMENTO -->
                    <fieldset class="form-secao">
                        <legend>Requisitos mínimos: memória e armazenamento</legend>
                        <div class="form-grade grade-3">
                            <div class="input-group">
                                <label for="ram_gb">Memoria Ram (GB)</label>
                                <input type="text" name="ram_gb" id="ram_gb" inputmode="numeric" placeholder="Digite a Quantidade de Memoria Ram">
                            </div>
                            <div class="input-group">
                                <label for="vram_gb">Vram (GB)</label>
                                <input type="text" name="vram_gb" id="vram_gb" inputmode="numeric" placeholder="Digite a Quantidade de VRAM">
                            </div>
                            <div class="input-group">
                                <label for="armazenamento">Armazenamento (GB)</label>
                                <input type="text" name="armazenamento" id="armazenamento" inputmode="numeric" placeholder="Digite a Quantidade de Armazenamento">
                            </div>
                        </div>
                    </fieldset>

                    <!-- IMAGEM -->
                    <fieldset class="form-secao">
                        <legend>Imagem do jogo</legend>
                        <div class="input-group">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" id="foto" accept="image/png, image/jpeg, image/jpg, image/webp" required>
                        </div>
                    </fieldset>

                    <button type="submit" class="btn btn-primario btn-cadastro">Cadastrar jogos</button>

                </form>
            </div>
        </div>
    </main>

    <?php include "../INCLUDES/footer.php"; ?>

    <script src="../ASSETS/JS/index.js"></script>
</body>

</html>
