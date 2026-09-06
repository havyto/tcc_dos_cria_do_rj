<?php
session_start();
error_reporting(E_ALL & ~E_DEPRECATED);

mysql_connect("localhost", "root", "");
mysql_select_db("ghost_gamer");

if (!isset($_SESSION["id"])) {
    die("Você precisa estar logado para adicionar um jogo.");
}

if (!isset($_POST["id_jogo"])) {
    die("Jogo não informado.");
}

$id_cliente = mysql_real_escape_string($_SESSION["id"]);
$id_jogo = mysql_real_escape_string($_POST["id_jogo"]);

$sql = "SELECT * FROM biblioteca
        WHERE id_cliente = '$id_cliente'
        AND id_jogo = '$id_jogo'";

$resultado = mysql_query($sql);

if (mysql_num_rows($resultado) > 0) {
    header("Location: ../PAGINAS/telajogo.php?id=$id_jogo&mensagem=ja_adicionado");
    exit;
}

$sql = "INSERT INTO biblioteca (id_cliente, id_jogo)
        VALUES ('$id_cliente', '$id_jogo')";

if (mysql_query($sql)) {
    header("Location: ../PAGINAS/telajogo.php?id=$id_jogo&mensagem=adicionado");
    exit;
} else {
    die("Erro ao adicionar o jogo à biblioteca.");
}
?>