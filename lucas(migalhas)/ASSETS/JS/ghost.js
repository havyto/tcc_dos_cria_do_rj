/* GHOST GAMER — comportamentos compartilhados
   O menu lateral (botão ☰) continua nos JS de cada página (index.js, etc.).
   Aqui ficam só: a busca e o submenu de administração. */

(function () {

    /* ---------- 1. BUSCA ----------
       Filtra, na própria página, tudo que tiver data-titulo (e data-genero).
       Cards de jogo, categorias e perguntas do suporte usam esses atributos. */
    var campo = document.getElementById("searchInput");

    // tira acentos e maiúsculas: "Ação" e "acao" são tratados como iguais
    function normaliza(texto) {
        var t = (texto || "").toLowerCase();
        if (t.normalize) {
            t = t.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
        }
        return t;
    }

    if (campo) {
        var itens = document.querySelectorAll("[data-titulo]");
        var secoes = document.querySelectorAll("[data-secao]");
        var semResultado = document.getElementById("semResultado");

        campo.addEventListener("input", function () {
            var busca = normaliza(campo.value.replace(/^\s+|\s+$/g, ""));
            var visiveis = 0;

            for (var i = 0; i < itens.length; i++) {
                var texto = normaliza(itens[i].getAttribute("data-titulo") + " " + (itens[i].getAttribute("data-genero") || ""));
                var mostra = busca === "" || texto.indexOf(busca) !== -1;
                itens[i].hidden = !mostra;
                if (mostra) { visiveis++; }
            }

            // esconde a seção inteira quando nenhum item dela combina com a busca
            for (var j = 0; j < secoes.length; j++) {
                var dentro = secoes[j].querySelectorAll("[data-titulo]");
                if (dentro.length === 0) { continue; }
                var algum = secoes[j].querySelectorAll("[data-titulo]:not([hidden])").length > 0;
                secoes[j].hidden = busca !== "" && !algum;
            }

            // a classe "buscando" deixa a página só com os resultados (ex.: some o destaque da Home)
            document.body.className = document.body.className.replace(/\s*buscando/g, "");
            if (busca !== "") { document.body.className += " buscando"; }

            if (semResultado) { semResultado.hidden = !(busca !== "" && visiveis === 0); }
        });
    }

    /* ---------- 2. SUBMENU DE ADMINISTRAÇÃO ---------- */
    var telaPequena = window.matchMedia("(max-width: 1119px)");
    var menusAdmin = document.querySelectorAll(".menu-admin");

    // na gaveta lateral (telas pequenas) o submenu já fica aberto
    function ajustaSubmenu() {
        for (var i = 0; i < menusAdmin.length; i++) {
            if (telaPequena.matches) { menusAdmin[i].setAttribute("open", ""); }
            else { menusAdmin[i].removeAttribute("open"); }
        }
    }
    ajustaSubmenu();
    if (telaPequena.addEventListener) { telaPequena.addEventListener("change", ajustaSubmenu); }

    // no computador, fecha ao clicar fora ou apertar ESC
    document.addEventListener("click", function (e) {
        if (telaPequena.matches) { return; }
        for (var i = 0; i < menusAdmin.length; i++) {
            if (!menusAdmin[i].contains(e.target)) { menusAdmin[i].removeAttribute("open"); }
        }
    });
    document.addEventListener("keydown", function (e) {
        if (e.key === "Escape" && !telaPequena.matches) {
            for (var i = 0; i < menusAdmin.length; i++) { menusAdmin[i].removeAttribute("open"); }
        }
    });

})();
