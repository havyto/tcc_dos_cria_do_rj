<?php

    error_reporting(E_ALL ^ E_DEPRECATED);//ESCONDE ERROS DE COD ANTIGO
    $id = mysql_connect ("localhost", "root", "");
    $con = mysql_select_db ("ghost_gamer", $id);

    $razao_social = $_POST['razao_social'];
    $nome_fantasia = $_POST['nome_fantasia'];
    $CNPJ = $_POST['CNPJ'];
    $data_abertura = $_POST['data_abertura'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $Rua = $_POST['Rua'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    $pais = $_POST['pais'];
    
    $sql = "insert into empresa (razao_social, nome_fantasia, CNPJ, data_abertura, telefone, email, Rua, numero, bairro, cidade, estado, cep, pais) values
    ('$razao_social', '$nome_fantasia', '$CNPJ', '$data_abertura', '$telefone', '$email', '$Rua', '$numero', '$bairro', '$cidade', '$estado', '$cep', '$pais')";
    mysql_query($sql);
    mysql_close($id);
    echo "gravado com sucesso";
    header("location: cadastro.php");

?>