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

        $cod = $_POST['id_jogo'];
        $titulo = $_POST['titulo'];
        $empresa_email = $_POST['empresa_email'];
        $genero = $_POST['genero'];
        $nucleos = $_POST['nucleos'];
        $threads = $_POST['threads'];
        $frequencia = $_POST['frequencia'];
        $ram_gb = $_POST['ram_gb'];
        $vram_gb = $_POST['vram_gb'];
        $armazenamento = $_POST['armazenamento'];
        
        $sql = "update jogo set titulo= '$titulo', empresa_email = '$empresa_email', genero = '$genero', 
        nucleos = '$nucleos', threads = '$threads', frequencia = '$frequencia', ram_gb = '$ram_gb', vram_gb = '$vram_gb',
         armazenamento = '$armazenamento' where id_jogo ='$cod'";

    }
    mysql_query($sql);
	header("location: consulta.php");
?>