<?php 
    error_reporting(E_ALL ^ E_DEPRECATED);
    $id = mysql_connect ("localhost", "root", "");
    $con = mysql_select_db ("ghost_gamer", $id);
    $cod = $_POST['id_cliente'];
    
    $sql = "delete from clientes where id_cliente = '$cod'";
    mysql_query($sql);
    header("location: consulta.php");
?>