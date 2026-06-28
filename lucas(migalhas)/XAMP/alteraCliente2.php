<?php 
    error_reporting(E_ALL ^ E_DEPRECATED); //ESCONDE ERROS DE COD ANTIGO
    $id = mysql_connect ("localhost", "root", "");
    $con = mysql_select_db ("ghost_gamer", $id);
    $cod = $_POST['id_cliente'];
	$nome = $_POST['cli_nome'];
	$email = $_POST['email'];
	$nickname = $_POST['nickname'];
    $senha = $_POST['senha'];
	$administrador = $_POST['administrador'];

    $sql = "update clientes set cli_nome = '$nome', email = '$email', nickname = '$nickname', 
	senha = '$senha', administrador = '$administrador' where id_cliente = '$cod'";

    mysql_query($sql);
	header("location: consulta.php");
?>