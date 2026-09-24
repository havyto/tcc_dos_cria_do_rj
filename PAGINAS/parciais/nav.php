<?php
/**
 * Partial de navegação.
 *
 * Espera que a página que faz o include já tenha definido:
 *   $base          -> "" se a página está na raiz (index.php)
 *                      ou "../" se está dentro de /PAGINAS
 *   $paginaAtual   -> nome do arquivo atual, ex: "suporte.php" (opcional, para destacar o link ativo)
 *
 * E que já tenha rodado parciais/bootstrap.php (fornece $logado, $tipo, $usuarioLogado).
 */
$base        = $base ?? "";
$paginaAtual = $paginaAtual ?? "";

$fotoPerfil = $logado ? urlFotoPerfil($usuarioLogado["foto"], $base) : null;
$nomeExib   = $logado ? ($usuarioLogado["nickname"] ?: $usuarioLogado["nome"]) : "Visitante";
?>
<header class="topbar">
    <button id="menu-btn" class="menu-btn" aria-label="Abrir menu">☰</button>

    <a href="<?= $base ?>index.php" class="brand">
        <img src="<?= $base ?>ASSETS/IMG/logo.png" class="brand-logo" alt="Ghost Gamer">
        <span class="brand-name">GHOST GAMER</span>
    </a>

    <div class="search-box">
        <input type="text" id="searchInput" placeholder="Buscar jogos...">
    </div>

    <div class="topbar-user">
        <?php if ($logado): ?>
            <a href="<?= $base ?>PAGINAS/perfil.php" class="user-chip">
                <?php if ($fotoPerfil): ?>
                    <img src="<?= htmlspecialchars($fotoPerfil) ?>" class="user-chip-avatar" alt="">
                <?php else: ?>
                    <span class="user-chip-avatar user-chip-avatar--iniciais"><?= htmlspecialchars(iniciaisNome($usuarioLogado["nome"] ?: $nomeExib)) ?></span>
                <?php endif; ?>
                <span class="user-chip-nome"><?= htmlspecialchars($nomeExib) ?></span>
            </a>
        <?php else: ?>
            <a href="<?= $base ?>PAGINAS/loginCliente.php" class="btn btn-outline btn-sm">Entrar</a>
        <?php endif; ?>
    </div>
</header>

<nav id="menu" class="menu">
    <div class="menu-user">
        <?php if ($logado): ?>
            <?php if ($fotoPerfil): ?>
                <img src="<?= htmlspecialchars($fotoPerfil) ?>" class="menu-user-avatar" alt="">
            <?php else: ?>
                <span class="menu-user-avatar menu-user-avatar--iniciais"><?= htmlspecialchars(iniciaisNome($usuarioLogado["nome"] ?: $nomeExib)) ?></span>
            <?php endif; ?>
            <div>
                <strong><?= htmlspecialchars($nomeExib) ?></strong>
                <span class="menu-user-status">🟢 Online</span>
            </div>
        <?php else: ?>
            <div class="menu-user-avatar menu-user-avatar--iniciais">?</div>
            <div>
                <strong>Visitante</strong>
                <span class="menu-user-status">Faça login para continuar</span>
            </div>
        <?php endif; ?>
    </div>

    <ul>
        <li><a class="<?= $paginaAtual === 'index.php' ? 'ativo' : '' ?>" href="<?= $base ?>index.php">🏠 Home</a></li>
        <li><a class="<?= $paginaAtual === 'biblioteca.php' ? 'ativo' : '' ?>" href="<?= $base ?>PAGINAS/biblioteca.php">📚 Biblioteca</a></li>
        <li><a class="<?= $paginaAtual === 'categoria.php' ? 'ativo' : '' ?>" href="<?= $base ?>PAGINAS/categoria.php">🗂️ Categoria</a></li>

        <?php if ($tipo === "admin"): ?>
            <li class="menu-separador">Administração</li>
            <li><a href="<?= $base ?>XAMP/consulta.php">🔎 Consulta</a></li>
            <li><a href="<?= $base ?>PAGINAS/cadastroEmpresa.php">🏢 Cadastro de Empresa</a></li>
            <li><a href="<?= $base ?>PAGINAS/cadastroJogos.php">🎮 Cadastro de Jogos</a></li>
        <?php endif; ?>

        <li class="menu-separador">Conta</li>
        <?php if ($logado): ?>
            <li><a class="<?= $paginaAtual === 'perfil.php' ? 'ativo' : '' ?>" href="<?= $base ?>PAGINAS/perfil.php">👤 Perfil</a></li>
        <?php endif; ?>
        <li><a class="<?= $paginaAtual === 'suporte.php' ? 'ativo' : '' ?>" href="<?= $base ?>PAGINAS/suporte.php">💬 Suporte</a></li>

        <?php if (!$logado): ?>
            <li><a class="<?= $paginaAtual === 'loginCliente.php' ? 'ativo' : '' ?>" href="<?= $base ?>PAGINAS/loginCliente.php">🔑 Login</a></li>
            <li><a class="<?= $paginaAtual === 'cadastroCliente.php' ? 'ativo' : '' ?>" href="<?= $base ?>PAGINAS/cadastroCliente.php">📝 Cadastro</a></li>
        <?php else: ?>
            <li><a href="<?= $base ?>XAMP/logout.php">🚪 Sair</a></li>
        <?php endif; ?>
    </ul>
</nav>
<div class="overlay" id="overlay"></div>
