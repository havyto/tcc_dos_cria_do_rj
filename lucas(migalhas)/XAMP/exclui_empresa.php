<?php 
    error_reporting(E_ALL ^ E_DEPRECATED);
    $id = mysql_connect ("localhost", "root", "");
    $con = mysql_select_db ("ghost_gamer", $id);
    $cod = $_POST['id_empresa'];
    
    $sql = "delete from empresa where id_empresa = '$cod'";
    mysql_query($sql);
    header("location: consulta.php");
?>