<?php

    error_reporting(E_ALL ^ E_DEPRECATED);//ESCONDE ERROS DE COD ANTIGO
    if (isset($_SERVER['HTTP_REFERER'])) {
        $pagina_anterior = $_SERVER['HTTP_REFERER'];
        
    }
    $id = mysql_connect ("localhost", "root", "");
    $con = mysql_select_db ("ghost_gamer", $id);
    if($pagina_anterior =="http://localhost/lucas(migalhas)/PAGINAS/cadastroCliente.html"){
        $cli_nome = $_POST['cli_nome'];
        $email = $_POST['email'];
        $nickname = $_POST['nickname'];
        $senha = $_POST['senha'];
        $sql = "insert into clientes (cli_nome, email, nickname, senha) values
        ('$cli_nome', '$email', '$nickname', '$senha')";
    }
    if($pagina_anterior == "http://localhost/lucas(migalhas)/PAGINAS/cadastroEmpresa.php"){
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
    }
    if($pagina_anterior == "http://localhost/projects/tcc_dos_cria_do_rj-main/lucas(migalhas)/PAGINAS/cadastroJogos.php"){
        
    $titulo = $_POST['titulo'];
    $empresa_email = $_POST['empresa_email'];
    $genero = $_POST['genero'];
    $nucleos = $_POST['nucleos'];
    $threads = $_POST['threads'];
    $frequencia = $_POST['frequencia'];
    $ram_gb = $_POST['ram_gb'];
    $vram_gb = $_POST['vram_gb'];
    $armazenamento = $_POST['armazenamento'];
    
    $sql = "insert into jogo (titulo, empresa_email, genero, nucleos, threads, frequencia, ram_gb, vram_gb, armazenamento) values
        ('$titulo', '$empresa_email', '$genero', '$nucleos', '$threads', '$frequencia', '$ram_gb', '$vram_gb', '$armazenamento')";
        
    }
mysql_query($sql);
mysql_close($id);

header("location: $pagina_anterior");
exit;

?>