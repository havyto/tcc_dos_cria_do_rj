```php
<?php

session_start();

error_reporting(E_ALL & ~E_DEPRECATED);


/* =====================================
   VERIFICA SESSÃO
===================================== */

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

    $codigo = trim($_POST["codigo"]);

    $codigo = mysql_real_escape_string($codigo);


    /* =====================================
       VERIFICA CÓDIGO E VALIDADE
    ===================================== */

    $sql = "SELECT id_cliente
            FROM clientes
            WHERE email = '$email'
            AND token_recuperacao = '$codigo'
            AND token_expira >= NOW()";

    $resultado = mysql_query($sql);

    if (!$resultado) {
        die("Erro na consulta: " . mysql_error());
    }


    if (mysql_num_rows($resultado) == 0) {

        die("Código incorreto ou expirado.");

    }


    /* =====================================
       CÓDIGO CORRETO
    ===================================== */

    $_SESSION["codigo_verificado"] = true;

    header(
        "Location: ../PAGINAS/novaSenha.php"
    );

    exit;
}

mysql_close($id);

?>
```
