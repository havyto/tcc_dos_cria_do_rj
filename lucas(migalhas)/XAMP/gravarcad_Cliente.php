<?php

    error_reporting(E_ALL ^ E_DEPRECATED);//ESCONDE ERROS DE COD ANTIGO
    $id = mysql_connect ("localhost", "root", "");
    $con = mysql_select_db ("ghost_gamer", $id);

    $cli_nome = $_POST['cli_nome'];
    $email = $_POST['email'];
    $nickname = $_POST['nickname'];
    $senha = $_POST['senha'];
    $sql = "insert into clientes (cli_nome, email, nickname, senha) values
    ('$cli_nome', '$email', '$nickname', '$senha')";
    mysql_query($sql);
    mysql_close($id);
    echo "gravado com sucesso";
    header("location: cadastroCliente.php");

?>