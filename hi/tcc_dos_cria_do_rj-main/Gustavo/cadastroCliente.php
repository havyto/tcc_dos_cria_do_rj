<?php

// MOSTRAR ERROS (IMPORTANTE PRA DEBUG)
error_reporting(E_ALL & ~E_DEPRECATED);

// CONEXÃO
$id = mysql_connect("localhost", "root", "");
if (!$id) {
    die("Erro na conexão: " . mysql_error());
}

$con = mysql_select_db("ghost_gamer", $id);

$nome  = $_POST['cli_nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$nick  = $_POST['nickname'];


$sql = "INSERT INTO clientes (cli_nome, email, senha, nickname) 
VALUES ('$nome', '$email', '$senha', '$nick')";

// EXECUTAR E VERIFICAR ERRO
if (!mysql_query($sql)) {
    die("Erro no SQL: " . mysql_error());
}
	mysql_close($id);
	header("location: ../index.html");
exit;


?>