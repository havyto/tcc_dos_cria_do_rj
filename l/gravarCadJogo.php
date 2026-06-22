<?php
/**
 * Grava o cadastro de jogo - mysqli + prepared statement.
 */

require_once "conexao.php";

$titulo  = trim($_POST['titulo']  ?? '');
$contato = trim($_POST['contato'] ?? '');
$genero  = isset($_POST['genero']) ? implode(", ", $_POST['genero']) : '';

if ($titulo === '') {
    die("Erro: o nome do jogo é obrigatório. <a href='javascript:history.back()'>Voltar</a>");
}

$sql = "INSERT INTO jogo (titulo, empresa_email, genero) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conexao, $sql);

if (!$stmt) {
    die("Erro ao preparar a consulta: " . mysqli_error($conexao));
}

mysqli_stmt_bind_param($stmt, "sss", $titulo, $contato, $genero);

if (!mysqli_stmt_execute($stmt)) {
    die("Erro ao cadastrar jogo: " . mysqli_stmt_error($stmt));
}

mysqli_stmt_close($stmt);
mysqli_close($conexao);

header("location: consulta.php");
exit;
