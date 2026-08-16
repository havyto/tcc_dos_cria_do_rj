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
            <li><a href="loginCliente.php">Login</a></li>
            <li><a href="cadastroCliente.php">Cadastro</a></li>
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
                        <label>Razão Social</label>
                        <input type="text" name="razao_social" placeholder="Digite sua razão social">
                    </div>
                    <div class="input-group">
                        <label>Nome fantasia</label>
                        <input type="text" name="nome_fantasia" placeholder="Digite seu nome fantasia">
                    </div>
                    <div class="input-group">
                        <label>CNPJ</label>
                        <input type="text" name="CNPJ" placeholder="Digite seu CPNJ">
                    </div>
                    
                    <div class="input-group">
                        <label>Data de abertura</label>
                        <input type="date" name="data_abertura" placeholder="">
                    </div>

                    <div class="input-group">
                        <label>Telefone</label>
                        <input type="text" name="telefone" placeholder="Digite seu telefone de contato">
                    </div>
                    <div class="input-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Digite seu email">
                    </div>
                    <div class="input-group">
                        <label>Rua</label>
                        <input type="text" name="Rua" placeholder="Digite sua rua">
                    </div>
                    <div class="input-group">
                        <label>Numero</label>
                        <input type="text" name="numero" placeholder="Digite o numero">
                    </div>
                    <div class="input-group">
                        <label>Bairro</label>
                        <input type="text" name="bairro" placeholder="Digite seu bairro">
                    </div>
                    <div class="input-group">
                        <label>Cidade</label>
                        <input type="text" name="cidade" placeholder="Digite sua cidade">
                    </div>
                    <div class="input-group">
                        <label>Gênero</label>
                        <select name="estado" required class="input-genero">
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
                        <label>CEP</label>
                        <input type="text" name="cep" placeholder="Digite seu cep">
                    </div>
                    <div class="input-group">
                        <label>País</label>
                        <select name="pais" required class="input-genero">
                            <option value="" disabled selected>Selecione o PAÍS</option>
                            <option value="brasil">Brasil</option>
                            <option value="outros">Outros</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn-cadastro">CADASTRAR EMPRESA</button>
                    
                </form>
            </div>
        </div>
    </div>

    <script src="../ASSETS/JS/index.js"></script>
</body>
</html>