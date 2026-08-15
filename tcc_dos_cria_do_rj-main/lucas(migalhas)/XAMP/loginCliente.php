<?php

session_start();

error_reporting(E_ALL & ~E_DEPRECATED);

// CONEXÃO
$id = mysql_connect("localhost", "root", "");

if (!$id) {
    die("Erro ao conectar: " . mysql_error());
}

mysql_select_db("ghost_gamer", $id);

// VERIFICA SE O FORMULÁRIO FOI ENVIADO
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $senha = $_POST["senha"];

    $sql = "SELECT id_cliente,
                   cli_nome,
                   email,
                   senha,
                   administrador
            FROM clientes
            WHERE email = '$email'";

    $resultado = mysql_query($sql);

    if (!$resultado) {
        die("Erro na consulta: " . mysql_error());
    }

    // USUÁRIO ENCONTRADO?
    if (mysql_num_rows($resultado) > 0) {

        $usuario = mysql_fetch_assoc($resultado);

        // SENHA CORRETA?
        if (password_verify($senha, $usuario["senha"])) {

            session_regenerate_id(true);

            $_SESSION["id"] = $usuario["id_cliente"];
            $_SESSION["nome"] = $usuario["cli_nome"];
            $_SESSION["administrador"] = $usuario["administrador"];

            header("Location: ../index.php");
            exit;

        } else {

            // SENHA INCORRETA
            header("Location: ../PAGINAS/loginCliente.html");
            exit;

        }

    } else {

        // USUÁRIO NÃO ENCONTRADO
        header("Location: ../PAGINAS/loginCliente.html");
        exit;

    }

}

mysql_close($id);

?>