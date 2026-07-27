<?php 
    
    error_reporting(E_ALL ^ E_DEPRECATED); //ESCONDE ERROS DE COD ANTIGO
    if (isset($_SERVER['HTTP_REFERER'])) {
        $pagina_anterior = $_SERVER['HTTP_REFERER'];
        
    }
    $id = mysql_connect ("localhost", "root", "");
    $con = mysql_select_db ("ghost_gamer", $id);
    if($pagina_anterior =="http://localhost/lucas(migalhas)/XAMP/alteraCliente.php"){
        $cod = $_POST['id_cliente'];
        $nome = $_POST['cli_nome'];
        $email = $_POST['email'];
        $nickname = $_POST['nickname'];
        $senha = $_POST['senha'];
        $administrador = $_POST['administrador'];

        $sql = "update clientes set cli_nome = '$nome', email = '$email', nickname = '$nickname', 
        senha = '$senha', administrador = '$administrador' where id_cliente = '$cod'";
    }
    if($pagina_anterior == "http://localhost/lucas(migalhas)/XAMP/alteraEmpresa.php"){
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
    }
    if($pagina_anterior == "http://localhost/lucas(migalhas)/XAMP/alteraJogo.php"){
        $titulo = $_POST['titulo'];
        $empresa_email = $_POST['empresa_email'];
        $genero = $_POST['genero'];
        
        $sql = "insert into jogo (titulo, empresa_email, genero) values
        ('$titulo', '$empresa_email', '$genero')";
    }
    mysql_query($sql);
	header("location: consulta.php");
?>