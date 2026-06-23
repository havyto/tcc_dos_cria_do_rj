<?php
/**
 * Grava o cadastro de cliente - usa mysqli + prepared statement
 * (evita SQL Injection, ao contrário do gravarcad.php original que
 * usava mysql_query com os dados do formulário concatenados na string).
 */

require_once "conexao.php";

$nome  = trim($_POST['cli_nome'] ?? '');
$email = trim($_POST['email']    ?? '');
$senha = $_POST['senha']         ?? '';
$nick  = trim($_POST['nickname'] ?? '');

if ($nome === '' || $email === '' || $senha === '' || $nick === '') {
    die("Erro: todos os campos são obrigatórios. <a href='javascript:history.back()'>Voltar</a>");
}

$sql = "INSERT INTO clientes (cli_nome, email, senha, nickname) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($conexao, $sql);

if (!$stmt) {
    die("Erro ao preparar a consulta: " . mysqli_error($conexao));
}

mysqli_stmt_bind_param($stmt, "ssss", $nome, $email, $senha, $nick);

if (!mysqli_stmt_execute($stmt)) {
    die("Erro ao cadastrar cliente: " . mysqli_stmt_error($stmt));
}

mysqli_stmt_close($stmt);
mysqli_close($conexao);

header("location: consulta.php");
exit;
