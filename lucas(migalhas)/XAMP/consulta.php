<html>
<head>
<meta charset="UTF-8">
<title>Consulta no Banco</title>
</head>
<body>
<h1>Exibição de Dados</h1>
 
<form method="POST">
<br><br>
    <input type="submit" name="acao1" value="Mostrar Empresas"><br><br>
    <input type="submit" name="acao2" value="Mostrar Clientes"><br><br>
    <input type="submit" name="acao3" value="Mostrar Jogos"><br><br>
</form>
<hr>
 
<?php
error_reporting(0);
mysql_connect("localhost","root","");
mysql_select_db("ghost_gamer");
 
if (!empty($_POST['acao1'])) {
 
    if ($_POST['acao1']=="Mostrar Empresas") {
        $sql = "SELECT * FROM empresa";
    
    } else { // ação = Filtrar
        $filtros = [];
 
        //if (!empty($_POST['sexo']))   $filtros[] = "cli_sexo='" . ($_POST['sexo']) . "'";
        //if (!empty($_POST['dtnasc'])) $filtros[] = "cli_dtnasc='" . ($_POST['dtnasc']) . "'";
        //if (!empty($_POST['cidade'])) $filtros[] = "cli_cid LIKE '%" . ($_POST['cidade']) . "%'";
 
        //if (count($filtros)) {
         //   $where = "WHERE " . implode(" AND ", $filtros); // esta adicionando as condiçoes dentro da variavel
       // } else {
        //    $where = "";
       // }
       // $sql = "SELECT * FROM clientes $where";
    }
 
    $res = mysql_query($sql);
    echo "<table border=1px>
    <option> Informações de Empresas</option>
    <tr>
        <td> Código </td>
        <td> Razão Social </td>
        <td> Nome Fantasia </td>
        <td> Cnpj </td>
        <td> Data de Abertura </td>
        <td> Telefone </td>
        <td> Email </td>
        <td> Rua </td>
        <td> Numero </td>
        <td> Bairro </td>
        <td> Cidade </td>
        <td> Estado </td>
        <td> CEP </td>
        <td> Pais </td>
        <td> Alterar </td>
        <td> Excluir </td>
    </tr>";
 
    if (mysql_num_rows($res) > 0) {
        while ($linha = mysql_fetch_assoc($res)) {
            $id_empresa = $linha['id_empresa'];
            $razao_social = $linha['razao_social'];
            $nome_fantasia = $linha['nome_fantasia'];
            $CNPJ = $linha['CNPJ'];
            $data_abertura = $linha['data_abertura'];
            $telefone = $linha['telefone'];
            $email = $linha['email'];
            $Rua = $linha['Rua'];
            $numero = $linha['numero'];
            $bairro = $linha['bairro'];
            $cidade = $linha['cidade'];
            $estado = $linha['estado'];
            $cep = $linha['cep'];
            $pais = $linha['pais'];
            echo "
    <tr>
        <td> $id_empresa </td>
        <td> $razao_social </td>
        <td> $nome_fantasia </td>
        <td> $CNPJ </td>
        <td> $data_abertura </td>
        <td> $telefone </td>
        <td> $email </td>
        <td> $Rua </td>
        <td> $numero </td>
        <td> $bairro </td>
        <td> $cidade </td>
        <td> $estado </td>
        <td> $cep </td>
        <td> $pais </td>
        <td>
            <form method=post action=alteraEmpresa.php>
                <input type=submit value='Alterar' name='botao'>
                <input type=hidden name='id_empresa' value='$id_empresa'>
            </form>
        </td>
        <td>
            <form method=post action=exclui.php>
                <input type=submit value='Excluir' name='botao'>
                <input type=hidden name='id_empresa' value='$id_empresa'>
            </form>
        </td>

    </tr>";
    
        }
    }else {
        echo "Nenhum resultado encontrado.";
    }
    echo"</table>";
    echo    "<form method=post action=consulta2.php target=_blank>
                <input type=hidden name='acao1' value='Mostrar Empresas'>
                <input type=submit value=Gerar relatorio>
            </form>";
        
}

if (!empty($_POST['acao2'])) {
 
    if ($_POST['acao2']=="Mostrar Clientes") {
        $sql = "SELECT * FROM clientes";
    } else { // ação = Filtrar
        $filtros = [];
 
        //if (!empty($_POST['sexo']))   $filtros[] = "cli_sexo='" . ($_POST['sexo']) . "'";
        //if (!empty($_POST['dtnasc'])) $filtros[] = "cli_dtnasc='" . ($_POST['dtnasc']) . "'";
        //if (!empty($_POST['cidade'])) $filtros[] = "cli_cid LIKE '%" . ($_POST['cidade']) . "%'";
 
        //if (count($filtros)) {
         //   $where = "WHERE " . implode(" AND ", $filtros); // esta adicionando as condiçoes dentro da variavel
       // } else {
        //    $where = "";
       // }
       // $sql = "SELECT * FROM clientes $where";
    }
 
    $res = mysql_query($sql);
    echo "<table border=1px>
    <option> Informações de Clientes</option>
    <tr>
        <td> Código </td>
        <td> Nome </td>
        <td> Email </td>
        <td> Nickname </td>
        <td> Administrador </td>
        <td> Alterar </td>
        <td> Excluir </td>
    </tr>";
 
    if (mysql_num_rows($res) > 0) {
        while ($linha = mysql_fetch_assoc($res)) {
            $id_cliente = $linha['id_cliente'];
            $cli_nome = $linha['cli_nome'];
            $email = $linha['email'];
            $nickname = $linha['nickname'];
            $administrador = $linha['administrador'];
            echo "
    <tr>
        <td> $id_cliente </td>
        <td> $cli_nome </td>
        <td> $email </td>
        <td> $nickname </td>
        <td> $administrador </td>
        <td>
            <form method=post action=alteraCliente.php>
                <input type=submit value='Alterar' name='botao'>
                <input type=hidden name='id_cliente' value='$id_cliente'>
            </form>
        </td>
        <td>
            <form method=post action=exclui.php>
                <input type=submit value='Excluir' name='botao'>
                <input type=hidden name='id_cliente' value='$id_cliente'>
            </form>
        </td>
    </tr>";
        }
    }else {
        echo "Nenhum resultado encontrado.";
    }
    echo"</table>";
    echo    "<form method=post action=consulta2.php target=_blank>
                <input type=hidden name='acao2' value='Mostrar Clientes'>
                <input type=submit value=Gerar relatorio>
            </form>";
}

if (!empty($_POST['acao3'])) {
 
    if ($_POST['acao3']=="Mostrar Jogos") {
        $sql = "SELECT * FROM jogo";
    } else { // ação = Filtrar
        $filtros = [];
 
        //if (!empty($_POST['sexo']))   $filtros[] = "cli_sexo='" . ($_POST['sexo']) . "'";
        //if (!empty($_POST['dtnasc'])) $filtros[] = "cli_dtnasc='" . ($_POST['dtnasc']) . "'";
        //if (!empty($_POST['cidade'])) $filtros[] = "cli_cid LIKE '%" . ($_POST['cidade']) . "%'";
 
        //if (count($filtros)) {
         //   $where = "WHERE " . implode(" AND ", $filtros); // esta adicionando as condiçoes dentro da variavel
       // } else {
        //    $where = "";
       // }
       // $sql = "SELECT * FROM clientes $where";
    }
 
    $res = mysql_query($sql);
    echo "<table border=1px>
    <option> Informações de Jogos</option>
    <tr>
        <td> Código </td>
        <td> Titulo </td>
        <td> Email Empresarial </td>
        <td> Genero </td>
        <td> RAM (GB) </td>
        <td> VRAM (GB) </td>
        <td> Armazenamento </td>
        <td> Alterar </td>
        <td> Excluir </td>
    </tr>";
 
    if (mysql_num_rows($res) > 0) {
        while ($linha = mysql_fetch_assoc($res)) {
            $id_jogo = $linha['id_jogo'];
            $titulo = $linha['titulo'];
            $empresa_email = $linha['empresa_email'];
            $genero = $linha['genero'];
            $ram_gb = $linha['ram_gb'];
            $vram_gb = $linha['vram_gb'];
            $armazenamento = $linha['armazenamento'];
            echo "
    <tr>
        <td> $id_jogo </td>
        <td> $titulo </td>
        <td> $empresa_email </td>
        <td> $genero </td>
        <td> $ram_gb </td>
        <td> $vram_gb </td>
        <td> $armazenamento </td>
        <td>
            <form method=post action=alteraJogo.php>
                <input type=submit value='Alterar' name='botao'>
                <input type=hidden name='id_jogo' value='$id_jogo'>
            </form>
        </td>
        <td>
            <form method=post action=exclui.php>
                <input type=submit value='Excluir' name='botao'>
                <input type=hidden name='id_jogo' value='$id_jogo'>
            </form>
        </td>
    </tr>";
        }
    }else {
        echo "Nenhum resultado encontrado.";
    }
    echo"</table>";
    echo    "<form method=post action=consulta2.php target=_blank>
                <input type=hidden name='acao3' value='Mostrar Jogos'>
                <input type=submit value=Gerar relatorio>
            </form>";
}

?>

<a href="../index.php">Voltar</a>
</body>
</html>
