```php
<?php

session_start();

error_reporting(E_ALL & ~E_DEPRECATED);

/* =====================================
   PHPMailer
===================================== */

require_once "../vendor/autoload.php";




/* =====================================
   CONEXÃO COM BANCO
===================================== */

$id = mysql_connect("localhost", "root", "");

if (!$id) {
    die("Erro ao conectar: " . mysql_error());
}

mysql_select_db("ghost_gamer", $id);


/* =====================================
   VERIFICA FORMULÁRIO
===================================== */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);

    $email = mysql_real_escape_string($email);


    /* =====================================
       PROCURA O EMAIL
    ===================================== */

    $sql = "SELECT id_cliente, cli_nome, email
            FROM clientes
            WHERE email = '$email'";

    $resultado = mysql_query($sql);

    if (!$resultado) {
        die("Erro na consulta: " . mysql_error());
    }


    if (mysql_num_rows($resultado) == 0) {

        die("E-mail não encontrado.");

    }


    $usuario = mysql_fetch_assoc($resultado);


    /* =====================================
       GERA CÓDIGO
    ===================================== */

    $codigo = rand(100000, 999999);


    /* =====================================
       EXPIRA EM 15 MINUTOS
    ===================================== */

    $expira = date(
        "Y-m-d H:i:s",
        time() + (15 * 60)
    );


    /* =====================================
       SALVA NO BANCO
    ===================================== */

    $sqlUpdate = "UPDATE clientes
                  SET token_recuperacao = '$codigo',
                      token_expira = '$expira'
                  WHERE id_cliente = " . $usuario["id_cliente"];

    $resultadoUpdate = mysql_query($sqlUpdate);

    if (!$resultadoUpdate) {
        die("Erro ao salvar código: " . mysql_error());
    }


    /* =====================================
       CONFIGURA PHPMailer
    ===================================== */

    $mail = new PHPMailer();



$mail->IsSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Port = 587;

$mail->Username = "ghostsuporte143@gmail.com";
$mail->Password = "xubltkbcdllzudry";

$mail->SetFrom(
    "ghostsuporte143@gmail.com",
    "Ghost Gamer"
);

$mail->AddAddress(
    $usuario["email"],
    $usuario["cli_nome"]
);

$mail->IsHTML(true);
$mail->CharSet = "UTF-8";

$mail->Subject = "Ghost Gamer - Recuperacao de senha";

$mail->Body = "
    <h2>Ghost Gamer</h2>

    <p>Olá, {$usuario["cli_nome"]}!</p>

    <p>
        Recebemos uma solicitação para
        redefinir sua senha.
    </p>

    <p>Seu código é:</p>

    <h1>$codigo</h1>

    <p>
        Este código é válido por 15 minutos.
    </p>

    <p>
        Caso você não tenha solicitado isso,
        ignore este e-mail.
    </p>
";

if ($mail->Send()) {

    $_SESSION["email_recuperacao"] = $usuario["email"];

    header("Location: ../PAGINAS/verificarCodigo.php");
    exit;

} else {

    die("Erro ao enviar e-mail: " . $mail->ErrorInfo);
}

}

mysql_close($id);

?>
```
