<?php

    error_reporting(E_ALL ^ E_DEPRECATED);//ESCONDE ERROS DE COD ANTIGO
    $id = mysql_connect ("localhost", "root", "");
    $con = mysql_select_db ("ghost_gamer", $id);

    $titulo = $_POST['titulo'];
    $empresa_email = $_POST['empresa_email'];
    $genero = $_POST['genero'];
    
    $sql = "insert into jogo (titulo, empresa_email, genero) values
    ('$titulo', '$empresa_email', '$genero')";
    mysql_query($sql);
    mysql_close($id);
    echo "gravado com sucesso";
    header("location: cadastroJogos.php");

?>