```php
<?php

session_start();

error_reporting(E_ALL & ~E_DEPRECATED);


/* =====================================
   VERIFICA SESSÃO
===================================== */

if (!isset($_SESSION["codigo_verificado"])) {

    die("Acesso inválido.");

}

if (!isset($_SESSION["email_recuperacao"])) {

    die("Sessão inválida.");

}


$email = mysql_real_escape_string(
    $_SESSION["email_recuperacao"]
);


/* =====================================
   CONEXÃO
===================================== */

$id = mysql_connect("localhost", "root", "");

if (!$id) {
    die("Erro ao conectar: " . mysql_error());
}

mysql_select_db("ghost_gamer", $id);


/* =====================================
   FORMULÁRIO
===================================== */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $senha = $_POST["senha"];

    $confirmar = $_POST["confirmar_senha"];


    /* =====================================
       CONFIRMA SENHAS
    ===================================== */

    if ($senha != $confirmar) {

        die("As senhas não são iguais.");

    }


    /* =====================================
       CRIA HASH
    ===================================== */

    $senhaHash = password_hash(
        $senha,
        PASSWORD_DEFAULT
    );

    $senhaHash = mysql_real_escape_string(
        $senhaHash
    );


    /* =====================================
       ALTERA SENHA
    ===================================== */

    $sql = "UPDATE clientes

            SET senha = '$senhaHash',
                token_recuperacao = NULL,
                token_expira = NULL

            WHERE email = '$email'";

    $resultado = mysql_query($sql);

    if (!$resultado) {

        die(
            "Erro ao alterar senha: " .
            mysql_error()
        );

    }


    /* =====================================
       LIMPA SESSÃO
    ===================================== */

    unset($_SESSION["email_recuperacao"]);
    unset($_SESSION["codigo_verificado"]);


    /* =====================================
       VOLTA PARA LOGIN
    ===================================== */

    header(
        "Location: ../PAGINAS/loginCliente.php"
    );

    exit;

}

mysql_close($id);

?>
```
