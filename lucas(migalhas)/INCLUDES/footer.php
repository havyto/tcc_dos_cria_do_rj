<?php
/* FOOTER PADRÃO DO GHOST GAMER
   Usa a variável $base (a mesma do header.php). */
if (!isset($base)) { $base = "../"; }
$logado = !empty($_SESSION["id"]);
?>
<footer class="footer">
    <div class="container footer-grade">
        <div class="footer-marca">
            <div class="logo-linha">
                <img src="<?php echo $base; ?>ASSETS/IMG/logo.png" alt="" class="logo-img">
                <span class="logo-text">GHOST GAMER</span>
            </div>
            <p>Descubra jogos e confira os requisitos antes de jogar.</p>
        </div>

        <div>
            <h4>NAVEGAR</h4>
            <ul>
                <li><a href="<?php echo $base; ?>index.php">Home</a></li>
                <?php if ($logado) { ?>
                    <li><a href="<?php echo $base; ?>PAGINAS/categoria.php">Categoria</a></li>
                    <li><a href="<?php echo $base; ?>PAGINAS/biblioteca.php">Biblioteca</a></li>
                <?php } ?>
            </ul>
        </div>

        <div>
            <h4>CONTA</h4>
            <ul>
                <?php if ($logado) { ?>
                    <li><a href="<?php echo $base; ?>PAGINAS/perfil.php">Perfil</a></li>
                    <li><a href="<?php echo $base; ?>XAMP/logout.php">Sair</a></li>
                <?php } else { ?>
                    <li><a href="<?php echo $base; ?>PAGINAS/loginCliente.php">Entrar</a></li>
                    <li><a href="<?php echo $base; ?>PAGINAS/cadastroCliente.php">Criar conta</a></li>
                <?php } ?>
            </ul>
        </div>

        <div>
            <h4>AJUDA</h4>
            <ul>
                <li><a href="<?php echo $base; ?>PAGINAS/suporte.php">Central de suporte</a></li>
                <li><a href="<?php echo $base; ?>PAGINAS/esqueciSenha.html">Esqueci minha senha</a></li>
            </ul>
        </div>
    </div>

    <p class="footer-copia">© 2026 Ghost Gamer — Projeto de TCC</p>
</footer>
