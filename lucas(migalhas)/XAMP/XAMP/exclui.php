<?php 
    error_reporting(E_ALL ^ E_DEPRECATED);
    $id = mysql_connect ("localhost", "root", "");
    $con = mysql_select_db ("ghost_gamer", $id);
    
    if(isset($_POST['id_cliente'])){
        $cod = $_POST['id_cliente'];
        $sql = "delete from clientes where id_cliente = '$cod'";
    }
    if(isset($_POST['id_jogo'])){
        $cod = $_POST['id_jogo'];
        $sql = "delete from jogo where id_jogo = '$cod'";
    }
    if(isset($_POST['id_empresa'])){
        $cod = $_POST['id_empresa'];
        $sql = "delete from empresa where id_empresa = '$cod'";
    }
    mysql_query($sql);
    header("location: consulta.php");
?>