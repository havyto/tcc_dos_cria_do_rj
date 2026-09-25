<?php
/* HEADER PADRÃO DO GHOST GAMER (usado em todas as páginas)

   Antes de incluir, a página define:
     $base         caminho até a raiz do projeto: "" no index.php, "../" nas demais pastas
     $pagina       item ativo do menu: home, categoria, biblioteca, perfil, suporte, login
     $busca        true para mostrar a barra de busca (opcional)
     $busca_texto  texto do campo de busca (opcional)

   A sessão (session_start) precisa ter sido iniciada pela página. */

if (!isset($base)) { $base = "../"; }
if (!isset($pagina)) { $pagina = ""; }
if (!isset($busca)) { $busca = false; }
if (!isset($busca_texto)) { $busca_texto = "Buscar jogos..."; }

$tipo = isset($_SESSION["administrador"]) ? $_SESSION["administrador"] : "usuario";
$logado = !empty($_SESSION["id"]);
?>
<header class="header<?php if (!$busca) { echo ' sem-busca'; } ?>">
    <button id="menu-btn" type="button" aria-label="Abrir menu">☰</button>

    <a href="<?php echo $base; ?>index.php" class="logo-aba" aria-label="Ghost Gamer - ir para a Home">
        <img src="<?php echo $base; ?>ASSETS/IMG/logo.png" alt="" class="logo-img">
        <span class="logo-text">GHOST GAMER</span>
    </a>

    <!-- MENU (barra no computador, gaveta lateral no celular) -->
    <nav id="menu" class="menu" aria-label="Menu principal">
        <ul class="menu-principal">
            <li><a href="<?php echo $base; ?>index.php" <?php if ($pagina == "home") { echo 'aria-current="page"'; } ?>>Home</a></li>

            <?php if ($logado) { ?>
                <li><a href="<?php echo $base; ?>PAGINAS/categoria.php" <?php if ($pagina == "categoria") { echo 'aria-current="page"'; } ?>>Categoria</a></li>
                <li><a href="<?php echo $base; ?>PAGINAS/biblioteca.php" <?php if ($pagina == "biblioteca") { echo 'aria-current="page"'; } ?>>Biblioteca</a></li>
                <li><a href="<?php echo $base; ?>PAGINAS/suporte.php" <?php if ($pagina == "suporte") { echo 'aria-current="page"'; } ?>>Suporte</a></li>
            <?php } ?>
        </ul>

        <ul class="menu-conta">
            <!-- SÓ ADMIN -->
            <?php if ($tipo === "admin") { ?>
                <li>
                    <details class="menu-admin">
                        <summary title="Administração"><span class="ico ico-painel" aria-hidden="true"></span><span class="rotulo">Administração</span><span class="ico ico-seta-baixo" aria-hidden="true"></span></summary>
                        <ul>
                            <li><a href="<?php echo $base; ?>XAMP/consulta.php">Consulta</a></li>
                            <li><a href="<?php echo $base; ?>PAGINAS/cadastroEmpresa.php">Cadastro de Empresa</a></li>
                            <li><a href="<?php echo $base; ?>PAGINAS/cadastroJogos.php">Cadastro de Jogos</a></li>
                        </ul>
                    </details>
                </li>
            <?php } ?>

            <?php if ($logado) { ?>
                <li><a href="<?php echo $base; ?>PAGINAS/perfil.php" title="Perfil" <?php if ($pagina == "perfil") { echo 'aria-current="page"'; } ?>><span class="ico ico-usuario" aria-hidden="true"></span><span class="rotulo">Perfil</span></a></li>
                <li><a href="<?php echo $base; ?>XAMP/logout.php" class="menu-sair" title="Sair"><span class="ico ico-sair" aria-hidden="true"></span><span class="rotulo">Sair</span></a></li>
            <?php } else { ?>
                <li><a href="<?php echo $base; ?>PAGINAS/loginCliente.php" class="menu-entrar"><span class="ico ico-entrar" aria-hidden="true"></span>Entrar</a></li>
            <?php } ?>
        </ul>
    </nav>

    <?php if ($busca) { ?>
        <div class="busca">
            <span class="ico ico-busca" aria-hidden="true"></span>
            <input type="search" id="searchInput" placeholder="<?php echo $busca_texto; ?>" aria-label="<?php echo $busca_texto; ?>" autocomplete="off">
        </div>
    <?php } ?>
</header>
