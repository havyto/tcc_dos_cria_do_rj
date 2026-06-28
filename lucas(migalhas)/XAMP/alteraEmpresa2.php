<?php 
    error_reporting(E_ALL ^ E_DEPRECATED);
    $id = mysql_connect ("localhost", "root", "");
    $con = mysql_select_db ("ghost_gamer", $id);
    
    $cod = $_POST['id_empresa'];
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

    $sql = "update empresa set razao_social = '$razao_social', nome_fantasia = '$nome_fantasia', 
    CNPJ = '$CNPJ', data_abertura = '$data_abertura', telefone = '$telefone', email = '$email', 
    Rua = '$Rua', numero = '$numero', bairro = '$bairro', cidade = '$cidade', estado = '$estado', 
    cep = '$cep', pais = '$pais' where id_empresa = '$cod'";

    mysql_query($sql);
    header("location: consulta.php");
?>