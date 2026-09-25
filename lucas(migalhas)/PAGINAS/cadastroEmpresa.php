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
    <title>Cadastro de Empresa - Ghost Gamer</title>
</head>
<body>

    <?php include "../INCLUDES/header.php"; ?>

    <main class="container">

        <section class="cabecalho-pagina">
            <h1>Cadastro de empresa</h1>
            <p>Cadastre a empresa desenvolvedora que poderá ser associada aos jogos.</p>
        </section>

        <!-- Apenas Cadastro Form - Centralizado -->
        <div class="cadastro-wrapper">
            <div class="form-box cadastro-box form-largo">
                <form method="post" action="../XAMP/gravarcad.php">

                    <!-- DADOS DA EMPRESA -->
                    <fieldset class="form-secao">
                        <legend>Dados da empresa</legend>
                        <div class="form-grade">
                            <div class="input-group">
                                <label for="razao_social">Razão Social</label>
                                <input type="text" name="razao_social" id="razao_social" placeholder="Digite sua razão social">
                            </div>
                            <div class="input-group">
                                <label for="nome_fantasia">Nome fantasia</label>
                                <input type="text" name="nome_fantasia" id="nome_fantasia" placeholder="Digite seu nome fantasia">
                            </div>
                            <div class="input-group">
                                <label for="CNPJ">CNPJ</label>
                                <input type="text" name="CNPJ" id="CNPJ" placeholder="Digite seu CPNJ">
                            </div>
                            <div class="input-group">
                                <label for="data_abertura">Data de abertura</label>
                                <input type="date" name="data_abertura" id="data_abertura" placeholder="">
                            </div>
                        </div>
                    </fieldset>

                    <!-- CONTATO -->
                    <fieldset class="form-secao">
                        <legend>Contato</legend>
                        <div class="form-grade">
                            <div class="input-group">
                                <label for="telefone">Telefone</label>
                                <input type="text" name="telefone" id="telefone" placeholder="Digite seu telefone de contato">
                            </div>
                            <div class="input-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" placeholder="Digite seu email">
                            </div>
                        </div>
                    </fieldset>

                    <!-- ENDEREÇO -->
                    <fieldset class="form-secao">
                        <legend>Endereço</legend>
                        <div class="form-grade">
                            <div class="input-group campo-largo">
                                <label for="Rua">Rua</label>
                                <input type="text" name="Rua" id="Rua" placeholder="Digite sua rua">
                            </div>
                            <div class="input-group">
                                <label for="numero">Numero</label>
                                <input type="text" name="numero" id="numero" placeholder="Digite o numero">
                            </div>
                            <div class="input-group">
                                <label for="bairro">Bairro</label>
                                <input type="text" name="bairro" id="bairro" placeholder="Digite seu bairro">
                            </div>
                            <div class="input-group">
                                <label for="cidade">Cidade</label>
                                <input type="text" name="cidade" id="cidade" placeholder="Digite sua cidade">
                            </div>
                            <div class="input-group">
                                <label for="estado">Estado</label>
                                <select name="estado" id="estado" required class="input-genero">
                                    <option value="" disabled selected>Selecione o Estado</option>
                                <option value="AC">AC</option>
                                <option value="AL">AL</option>
                                <option value="AP">AP</option>
                                <option value="AM">AM</option>
                                <option value="BA">BA</option>
                                <option value="CE">CE</option>
                                <option value="DF">DF</option>
                                <option value="ES">ES</option>
                                <option value="GO">GO</option>
                                <option value="MA">MA</option>
                                <option value="MT">MT</option>
                                <option value="MS">MS</option>
                                <option value="MG">MG</option>
                                <option value="PA">PA</option>
                                <option value="PB">PB</option>
                                <option value="PR">PR</option>
                                <option value="PE">PE</option>
                                <option value="PI">PI</option>
                                <option value="RJ">RJ</option>
                                <option value="RN">RN</option>
                                <option value="RS">RS</option>
                                <option value="RO">RO</option>
                                <option value="RR">RR</option>
                                <option value="SC">SC</option>
                                <option value="SP">SP</option>
                                <option value="SE">SE</option>
                                <option value="TO">TO</option>
                                </select>
                            </div>
                            <div class="input-group">
                                <label for="cep">CEP</label>
                                <input type="text" name="cep" id="cep" placeholder="Digite seu cep">
                            </div>
                            <div class="input-group">
                                <label for="pais">País</label>
                                <select name="pais" id="pais" required class="input-genero">
                                    <option value="" disabled selected>Selecione o PAÍS</option>
                                    <option value="brasil">Brasil</option>
                                    <option value="outros">Outros</option>
                                </select>
                            </div>
                        </div>
                    </fieldset>

                    <button type="submit" class="btn btn-primario btn-cadastro">Cadastrar empresa</button>

                </form>
            </div>
        </div>
    </main>

    <?php include "../INCLUDES/footer.php"; ?>

    <script src="../ASSETS/JS/index.js"></script>
</body>
</html>
