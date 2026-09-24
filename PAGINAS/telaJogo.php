
<?php

session_start();

error_reporting(E_ALL);

// ==============================
// CONEXÃO COM O BANCO DE DADOS
// ==============================

$conexao = mysqli_connect("localhost", "root", "", "ghost_gamer");

if (!$conexao) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

// ==============================
// TIPO DO USUÁRIO
// ==============================

$tipo = isset($_SESSION["administrador"])
    ? $_SESSION["administrador"]
    : "usuario";

// ==============================
// VERIFICA SE O ID DO JOGO EXISTE
// ==============================

if (!isset($_GET["id"])) {
    die("Jogo não encontrado.");
}

$id_jogo = mysqli_real_escape_string($conexao, $_GET["id"]);

// ==============================
// BUSCA O JOGO
// ==============================

$sql = "SELECT * FROM jogo WHERE id_jogo = '$id_jogo'";

$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {
    die("Erro ao consultar o jogo: " . mysqli_error($conexao));
}

if (mysqli_num_rows($resultado) == 0) {
    die("Jogo não encontrado.");
}

$jogo = mysqli_fetch_assoc($resultado);

// ==============================
// DADOS DO JOGO
// ==============================

$titulo = $jogo["titulo"];

$empresa_email = $jogo["empresa_email"];

$genero = $jogo["genero"];

$nucleos = $jogo["nucleos"];

$threads = $jogo["threads"];

$frequencia = $jogo["frequencia"];

$ram_gb = $jogo["ram_gb"];

$vram_gb = $jogo["vram_gb"];

$armazenamento = $jogo["armazenamento"];

?>

