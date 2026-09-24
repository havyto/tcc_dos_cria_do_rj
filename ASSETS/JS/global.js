// ===================== MENU LATERAL =====================
(function () {
    const btn = document.getElementById("menu-btn");
    const menu = document.getElementById("menu");
    const overlay = document.getElementById("overlay");
    if (!btn || !menu || !overlay) return;

    function fecharMenu() {
        menu.classList.remove("ativo");
        overlay.classList.remove("ativo");
        btn.innerHTML = "☰";
    }

    function alternarMenu(e) {
        e.stopPropagation();
        const abrindo = !menu.classList.contains("ativo");
        menu.classList.toggle("ativo", abrindo);
        overlay.classList.toggle("ativo", abrindo);
        btn.innerHTML = abrindo ? "✕" : "☰";
    }

    btn.addEventListener("click", alternarMenu);
    overlay.addEventListener("click", fecharMenu);
    menu.addEventListener("click", (e) => e.stopPropagation());
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") fecharMenu();
    });
})();

// ===================== TOASTS =====================
function mostrarToast(mensagem, tipo = "info") {
    const container = document.getElementById("toast-container");
    if (!container) {
        alert(mensagem);
        return;
    }
    const toast = document.createElement("div");
    toast.className = "toast " + tipo;
    toast.textContent = mensagem;
    container.appendChild(toast);
    setTimeout(() => {
        toast.style.opacity = "0";
        toast.style.transition = "opacity .3s";
        setTimeout(() => toast.remove(), 300);
    }, 4200);
}

// ===================== HELPER DE FETCH JSON =====================
async function enviarFormulario(url, formData) {
    const resposta = await fetch(url, {
        method: "POST",
        body: formData,
        headers: { "X-Requested-With": "XMLHttpRequest" },
    });

    let dados;
    try {
        dados = await resposta.json();
    } catch (erro) {
        throw new Error("Resposta inesperada do servidor.");
    }

    if (!resposta.ok || !dados.ok) {
        throw new Error(dados.mensagem || "Não foi possível concluir a ação.");
    }

    return dados;
}
