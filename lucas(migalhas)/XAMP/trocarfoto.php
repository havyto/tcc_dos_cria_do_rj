<?php
session_start();
error_reporting(E_ALL & ~E_DEPRECATED);

mysql_connect("localhost", "root", "");
mysql_select_db("ghost_gamer");

$id_cliente = $_SESSION["id"];

if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] == 0) {

    $sql = "SELECT foto FROM clientes WHERE id_cliente = '$id_cliente'";
    $resultado = mysql_query($sql);
    $usuario = mysql_fetch_assoc($resultado);

    $foto_antiga = $usuario["foto"];

    $nome_foto = $_FILES["foto"]["name"];
    $nome_temporario = $_FILES["foto"]["tmp_name"];

    $pasta = "../ASSETS/IMG/";
    $novo_nome = time() . "_" . $nome_foto;

    $caminho = $pasta . $novo_nome;

    if (move_uploaded_file($nome_temporario, $caminho)) {

        if ($foto_antiga != "ASSETS/IMG/FotoPerfilPadrao.jpg") {

            $arquivo_antigo = "../" . $foto_antiga;

            if (file_exists($arquivo_antigo)) {
                unlink($arquivo_antigo);
            }
        }

        $foto_banco = "ASSETS/IMG/" . $novo_nome;

        $sql = "UPDATE clientes
                SET foto = '$foto_banco'
                WHERE id_cliente = '$id_cliente'";

        mysql_query($sql);
    }
}

header("Location: ../PAGINAS/perfil.php");
exit;
?>