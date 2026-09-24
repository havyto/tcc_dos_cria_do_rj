<?php
/**
 * Inclua este arquivo no topo de qualquer página que precise saber
 * se existe um usuário logado (para o menu, o Perfil, o Suporte etc).
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . "/../../XAMP/conexao.php";

$logado  = isset($_SESSION["id"]);
$tipo    = $_SESSION["administrador"] ?? "usuario";

$usuarioLogado = null;

if ($logado) {
    $usuarioLogado = [
        "id"       => $_SESSION["id"],
        "nome"     => $_SESSION["nome"] ?? "",
        "nickname" => $_SESSION["nickname"] ?? "",
        "foto"     => $_SESSION["foto"] ?? null,
        "email"    => $_SESSION["email"] ?? "",
    ];
}

/**
 * Gera a URL da foto de perfil do usuário, ou null se ele não tiver
 * uma foto customizada (nesse caso o front-end mostra um avatar com
 * as iniciais do nome).
 */
function urlFotoPerfil(?string $foto, string $base = ""): ?string
{
    if (empty($foto)) {
        return null;
    }
    return $base . $foto;
}

/**
 * Pega as iniciais de um nome para usar como avatar de fallback.
 */
function iniciaisNome(string $nome): string
{
    $nome = trim($nome);
    if ($nome === "") {
        return "?";
    }
    $partes = preg_split('/\s+/', $nome);
    $iniciais = mb_substr($partes[0], 0, 1);
    if (count($partes) > 1) {
        $iniciais .= mb_substr(end($partes), 0, 1);
    }
    return mb_strtoupper($iniciais);
}
