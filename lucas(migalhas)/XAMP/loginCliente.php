<?php

session_start();

error_reporting(E_ALL & ~E_DEPRECATED);

// CONEXÃO
$id = mysql_connect("localhost", "root", "");

if (!$id) {
    die("Erro ao conectar: " . mysql_error());
}

mysql_select_db("ghost_gamer", $id);

if (!mysql_select_db("ghost_gamer", $id)) {
    die("Erro ao selecionar banco: " . mysql_error());
}

echo "Banco selecionado com sucesso!";

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

    
    if (mysql_num_rows($resultado) > 0) {

        $usuario = mysql_fetch_assoc($resultado);

        
        if (password_verify($senha, $usuario["senha"])) {

            
            session_regenerate_id(true);

            
            $_SESSION["id"] = $usuario["id_cliente"];
            $_SESSION["nome"] = $usuario["cli_nome"];
            $_SESSION["administrador"] = $usuario["administrador"];

            
            header("Location: ../index.php");
            exit;

        } else {

            echo "Senha incorreta.";

        }

    } else {

        echo "Usuário não encontrado.";

    }

}

mysql_close($id);

?>