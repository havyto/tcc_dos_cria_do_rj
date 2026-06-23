<?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {

    error_reporting(E_ALL & ~E_DEPRECATED);

    $id = mysql_connect("localhost", "root", "");

    $con = mysql_select_db("ghost_gamer", $id);

    $titulo   = $_POST['titulo'];
    $contato  = $_POST['contato'];
    $genero = implode(", ", $_POST['genero']);
    $sql = "INSERT INTO jogo (titulo, empresa_email, genero) 
            VALUES ('$titulo', '$contato', '$genero')";
    mysql_query($sql);
    mysql_close($id);

    header("location: ../PAGINAS/cadastroJogos.html");
    exit;
 }

?>