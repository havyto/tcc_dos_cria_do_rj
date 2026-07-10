<?php

// MOSTRAR ERROS (IMPORTANTE PRA DEBUG)
error_reporting(E_ALL & ~E_DEPRECATED);

// CONEXÃO
$id = mysql_connect("sql304.infinityfree.com", "if0_42381706", "jKM7qhXLZxqUip0");
if (!$id) {
    die("Erro na conexão: " . mysql_error());
}

$con = mysql_select_db("ghost_gamer", $id);

$nome  = $_POST['cli_nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$nick  = $_POST['nickname'];
$senhahash = password_hash($senha, PASSWORD_DEFAULT);

$sql = "INSERT INTO clientes (cli_nome, email, senha, nickname) 
VALUES ('$nome', '$email', '$senhahash', '$nick')";

// EXECUTAR E VERIFICAR ERRO
if (!mysql_query($sql)) {
    die("Erro no SQL: " . mysql_error());
}
	mysql_close($id);
	header("location: ../index.php");
exit;


?>
