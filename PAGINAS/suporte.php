<?php
require_once __DIR__ . "/parciais/bootstrap.php";
$base = "../";
$paginaAtual = "suporte.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ghost Gamer - Suporte</title>
    <link rel="stylesheet" href="../ASSETS/CSS/global.css">
    <link rel="stylesheet" href="../ASSETS/CSS/suporte.css">
</head>
<body>

    <?php include __DIR__ . "/parciais/nav.php"; ?>

    <main class="container suporte-page">

        <section class="suporte-hero">
            <h1>Como podemos ajudar?</h1>
            <p>Envie sua dúvida, sugestão ou problema técnico. Sua mensagem cai direto na caixa de entrada da nossa equipe.</p>
        </section>

        <div class="suporte-grid">

            <form id="formSuporte" class="panel suporte-form" novalidate>

                <div id="msgSuporte" class="form-msg"></div>

                <!-- honeypot anti-spam (fica invisível para humanos) -->
                <div class="hp-field" aria-hidden="true">
                    <label for="site_web">Não preencha este campo</label>
                    <input type="text" id="site_web" name="site_web" tabindex="-1" autocomplete="off">
                </div>

                <div class="field-row">
                    <div class="field">
                        <label for="nome">Nome</label>
                        <input type="text" id="nome" name="nome" placeholder="Seu nome"
                               value="<?= htmlspecialchars($usuarioLogado["nome"] ?? "") ?>" required>
                    </div>
                    <div class="field">
                        <label for="email">E-mail para resposta</label>
                        <input type="email" id="email" name="email" placeholder="voce@email.com"
                               value="<?= htmlspecialchars($usuarioLogado["email"] ?? "") ?>" required>
                    </div>
                </div>

                <div class="field">
                    <label for="categoria">Categoria</label>
                    <select id="categoria" name="categoria">
                        <option value="Problema técnico">Problema técnico</option>
                        <option value="Conta e login">Conta e login</option>
                        <option value="Cobrança">Cobrança</option>
                        <option value="Sugestão">Sugestão</option>
                        <option value="Outro">Outro</option>
                    </select>
                </div>

                <div class="field">
                    <label for="assunto">Assunto</label>
                    <input type="text" id="assunto" name="assunto" placeholder="Resuma o assunto em poucas palavras" required>
                </div>

                <div class="field">
                    <label for="mensagem">Mensagem</label>
                    <textarea id="mensagem" name="mensagem" placeholder="Descreva com detalhes o que está acontecendo..." required></textarea>
                    <p class="field-hint"><span id="contadorMensagem">0</span>/2000 caracteres</p>
                </div>

                <button type="submit" class="btn btn-primary btn-block" id="btnEnviarSuporte">Enviar mensagem</button>
            </form>

            <aside class="panel suporte-info">
                <h3>Outros canais</h3>
                <ul class="suporte-lista">
                    <li><a href="biblioteca.php">📚 Comparação de requisitos de jogos</a></li>
                    <li><a href="perfil.php">👤 Gerenciar minha conta</a></li>
                    <li><a href="categoria.php">🗂️ Ver categorias de jogos</a></li>
                </ul>
                <p class="suporte-sla">⏱️ Tempo médio de resposta: até 24h úteis.</p>
            </aside>

        </div>

    </main>

    <?php include __DIR__ . "/parciais/footer.php"; ?>
    <script src="../ASSETS/JS/suporte.js"></script>
</body>
</html>
