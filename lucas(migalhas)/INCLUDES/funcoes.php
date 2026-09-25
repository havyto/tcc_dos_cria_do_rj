<?php
/* Funções pequenas usadas por várias páginas do Ghost Gamer.
   Uso:  include "../INCLUDES/funcoes.php";   (na raiz: "INCLUDES/funcoes.php") */

if (!function_exists("ghost_foto")) {
    // Devolve o caminho da capa do jogo.
    // Se o jogo não tem foto no banco, usa a imagem padrão.
    function ghost_foto($foto) {
        if (empty($foto)) {
            return "ASSETS/IMG/FotoJogoPadrao.jpg";
        }
        return $foto;
    }
}

if (!function_exists("ghost_icone_genero")) {
    // Devolve o nome da classe do ícone de cada gênero (ícones ficam no ghost.css).
    // Gêneros que não estão na lista usam o ícone de controle.
    function ghost_icone_genero($genero) {
        $mapa = array(
            "Terror"        => "ico-fantasma",
            "Corrida"       => "ico-carro",
            "Tiro"          => "ico-mira",
            "Battle Royale" => "ico-mira",
            "Ação"          => "ico-espada",
            "RPG"           => "ico-espada",
            "Luta"          => "ico-espada",
            "Musical"       => "ico-musica",
            "Aventura"      => "ico-bussola",
            "Sobrevivência" => "ico-bussola"
        );
        if (isset($mapa[$genero])) {
            return $mapa[$genero];
        }
        return "ico-controle";
    }
}
?>
