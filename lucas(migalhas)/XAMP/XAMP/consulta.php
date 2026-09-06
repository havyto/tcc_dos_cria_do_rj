
<html>

<head>
    <meta charset="UTF-8">
    <title>Consulta no Banco</title>
    <link rel="stylesheet" href="../ASSETS/CSS/consulta.css">
    
</head>

<body>

<h1>Exibição de Dados</h1>

<form method="POST">

    <input type="submit" name="acao1" value="Mostrar Empresas">
    <input type="submit" name="acao2" value="Mostrar Clientes">
    <input type="submit" name="acao3" value="Mostrar Jogos">

</form>

<hr>

<?php

error_reporting(0);

mysql_connect("localhost", "root", "");
mysql_select_db("ghost_gamer");


/* =========================================================
   EMPRESAS
   ========================================================= */

if (!empty($_POST['acao1'])) {

    // PESQUISA
    $pesquisa = "";
    if (isset($_POST['pesquisa'])) {
        $pesquisa = mysql_real_escape_string($_POST['pesquisa']);
    }

    // FILTROS
    $cidade = isset($_POST['cidade']) ? mysql_real_escape_string($_POST['cidade']) : '';
    $estado = isset($_POST['estado']) ? mysql_real_escape_string($_POST['estado']) : '';
    $pais = isset($_POST['pais']) ? mysql_real_escape_string($_POST['pais']) : '';


    /* =========================
       FORMULÁRIO DE PESQUISA
       ========================= */

    echo "
    <form method='POST'>

        <input type='text'
               name='pesquisa'
               placeholder='Pesquisar empresa'
               value='" . htmlspecialchars($pesquisa) . "'>

        <select name='cidade'>

            <option value=''>-- Todas as cidades --</option>
    ";

    // CIDADES
    $sql_cid = "SELECT DISTINCT cidade FROM empresa ORDER BY cidade";
    $result_cidade = mysql_query($sql_cid);

    while ($linha = mysql_fetch_assoc($result_cidade)) {

        $selecionado = ($cidade == $linha['cidade']) ? "selected" : "";

        echo "
            <option value='" . htmlspecialchars($linha['cidade']) . "' $selecionado>
                " . htmlspecialchars($linha['cidade']) . "
            </option>
        ";
    }

    echo "
        </select>


        <select name='estado'>

            <option value=''>-- Todos os estados --</option>
    ";

    // ESTADOS
    $sql_est = "SELECT DISTINCT estado FROM empresa ORDER BY estado";
    $result_estado = mysql_query($sql_est);

    while ($linha = mysql_fetch_assoc($result_estado)) {

        $selecionado = ($estado == $linha['estado']) ? "selected" : "";

        echo "
            <option value='" . htmlspecialchars($linha['estado']) . "' $selecionado>
                " . htmlspecialchars($linha['estado']) . "
            </option>
        ";
    }

    echo "
        </select>


        <select name='pais'>

            <option value=''>-- Todos os países --</option>
    ";

    // PAÍSES
    $sql_pais = "SELECT DISTINCT pais FROM empresa ORDER BY pais";
    $result_pais = mysql_query($sql_pais);

    while ($linha = mysql_fetch_assoc($result_pais)) {

        $selecionado = ($pais == $linha['pais']) ? "selected" : "";

        echo "
            <option value='" . htmlspecialchars($linha['pais']) . "' $selecionado>
                " . htmlspecialchars($linha['pais']) . "
            </option>
        ";
    }

    echo "
        </select>


        <input type='hidden'
               name='acao1'
               value='Mostrar Empresas'>

        <input type='submit'
               value='Pesquisar'>

    </form>

    <br>
    ";


    /* =========================
       SQL EMPRESA
       ========================= */

    $sql = "SELECT * FROM empresa WHERE 1=1";


    // PESQUISA
    if ($pesquisa != "") {

        $sql .= "
        AND (
            razao_social LIKE '%$pesquisa%'
            OR nome_fantasia LIKE '%$pesquisa%'
            OR CNPJ LIKE '%$pesquisa%'
            OR email LIKE '%$pesquisa%'
            OR cidade LIKE '%$pesquisa%'
        )";

    }


    // FILTRO CIDADE
    if ($cidade != "") {
        $sql .= " AND cidade = '$cidade'";
    }


    // FILTRO ESTADO
    if ($estado != "") {
        $sql .= " AND estado = '$estado'";
    }


    // FILTRO PAÍS
    if ($pais != "") {
        $sql .= " AND pais = '$pais'";
    }


    $res = mysql_query($sql);


    /* =========================
       TABELA
       ========================= */

    echo "
    <table border='1'>

        <caption>Informações de Empresas</caption>

        <tr>
            <td>Código</td>
            <td>Razão Social</td>
            <td>Nome Fantasia</td>
            <td>CNPJ</td>
            <td>Data de Abertura</td>
            <td>Telefone</td>
            <td>Email</td>
            <td>Rua</td>
            <td>Numero</td>
            <td>Bairro</td>
            <td>Cidade</td>
            <td>Estado</td>
            <td>CEP</td>
            <td>Pais</td>
            <td>Alterar</td>
            <td>Excluir</td>
        </tr>
    ";


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
            $cidade_resultado = $linha['cidade'];
            $estado_resultado = $linha['estado'];
            $cep = $linha['cep'];
            $pais_resultado = $linha['pais'];


            echo "
            <tr>

                <td>$id_empresa</td>
                <td>$razao_social</td>
                <td>$nome_fantasia</td>
                <td>$CNPJ</td>
                <td>$data_abertura</td>
                <td>$telefone</td>
                <td>$email</td>
                <td>$Rua</td>
                <td>$numero</td>
                <td>$bairro</td>
                <td>$cidade_resultado</td>
                <td>$estado_resultado</td>
                <td>$cep</td>
                <td>$pais_resultado</td>

                <td>
                    <form method='post' action='alteraEmpresa.php'>

                        <input type='submit'
                               value='Alterar'
                               name='botao'>

                        <input type='hidden'
                               name='id_empresa'
                               value='$id_empresa'>

                    </form>
                </td>


                <td>

                    <form method='post' action='exclui.php'>

                        <input type='submit'
                               value='Excluir'
                               name='botao'>

                        <input type='hidden'
                               name='id_empresa'
                               value='$id_empresa'>

                    </form>

                </td>

            </tr>
            ";
        }

    } else {

        echo "
        <tr>
            <td colspan='16'>
                Nenhum resultado encontrado.
            </td>
        </tr>
        ";
    }


    echo "</table>";


    /* =========================
       RELATÓRIO
       ========================= */

    echo "

    <br>

    <form method='post'
          action='gerarPDF.php'
          target='_blank'>

        <input type='hidden'
               name='acao1'
               value='Mostrar Empresas'>

        <input type='hidden'
               name='pesquisa'
               value='" . htmlspecialchars($pesquisa) . "'>

        <input type='hidden'
               name='cidade'
               value='" . htmlspecialchars($cidade) . "'>

        <input type='hidden'
               name='estado'
               value='" . htmlspecialchars($estado) . "'>

        <input type='hidden'
               name='pais'
               value='" . htmlspecialchars($pais) . "'>

        <input type='submit'
               value='Gerar relatório'>

    </form>

    ";
}



/* =========================================================
   CLIENTES
   ========================================================= */

if (!empty($_POST['acao2'])) {

    $pesquisa = "";
    if (isset($_POST['pesquisa'])) {
        $pesquisa = mysql_real_escape_string($_POST['pesquisa']);
    }


    $administrador = isset($_POST['administrador'])
        ? mysql_real_escape_string($_POST['administrador'])
        : '';


    /* =========================
       FORMULÁRIO
       ========================= */

    echo "

    <form method='POST'>

        <input type='text'
               name='pesquisa'
               placeholder='Pesquisar cliente'
               value='" . htmlspecialchars($pesquisa) . "'>


        <select name='administrador'>

            <option value=''>-- Todos os tipos --</option>
    ";


    $sql_usu = "
        SELECT DISTINCT administrador
        FROM clientes
        ORDER BY administrador
    ";

    $result_tipo_usuario = mysql_query($sql_usu);


    while ($linha = mysql_fetch_assoc($result_tipo_usuario)) {

        $selecionado =
            ($administrador == $linha['administrador'])
            ? "selected"
            : "";

        echo "
            <option value='" . htmlspecialchars($linha['administrador']) . "' $selecionado>
                " . htmlspecialchars($linha['administrador']) . "
            </option>
        ";
    }


    echo "

        </select>


        <input type='hidden'
               name='acao2'
               value='Mostrar Clientes'>


        <input type='submit'
               value='Pesquisar'>

    </form>

    <br>

    ";


    /* =========================
       SQL CLIENTES
       ========================= */

    $sql = "SELECT * FROM clientes WHERE 1=1";


    if ($pesquisa != "") {

        $sql .= "
        AND (
            cli_nome LIKE '%$pesquisa%'
            OR email LIKE '%$pesquisa%'
            OR nickname LIKE '%$pesquisa%'
        )";

    }


    if ($administrador != "") {

        $sql .= "
        AND administrador = '$administrador'
        ";

    }


    $res = mysql_query($sql);


    /* =========================
       TABELA
       ========================= */

    echo "

    <table border='1'>

        <caption>Informações de Clientes</caption>

        <tr>

            <td>Código</td>
            <td>Nome</td>
            <td>Email</td>
            <td>Nickname</td>
            <td>Administrador</td>
            <td>Alterar</td>
            <td>Excluir</td>

        </tr>

    ";


    if (mysql_num_rows($res) > 0) {

        while ($linha = mysql_fetch_assoc($res)) {

            $id_cliente = $linha['id_cliente'];
            $cli_nome = $linha['cli_nome'];
            $email = $linha['email'];
            $nickname = $linha['nickname'];
            $administrador_resultado = $linha['administrador'];


            echo "

            <tr>

                <td>$id_cliente</td>
                <td>$cli_nome</td>
                <td>$email</td>
                <td>$nickname</td>
                <td>$administrador_resultado</td>


                <td>

                    <form method='post'
                          action='alteraCliente.php'>

                        <input type='submit'
                               value='Alterar'
                               name='botao'>

                        <input type='hidden'
                               name='id_cliente'
                               value='$id_cliente'>

                    </form>

                </td>


                <td>

                    <form method='post'
                          action='exclui.php'>

                        <input type='submit'
                               value='Excluir'
                               name='botao'>

                        <input type='hidden'
                               name='id_cliente'
                               value='$id_cliente'>

                    </form>

                </td>

            </tr>

            ";
        }

    } else {

        echo "

        <tr>

            <td colspan='7'>
                Nenhum resultado encontrado.
            </td>

        </tr>

        ";
    }


    echo "</table>";


    /* =========================
       RELATÓRIO
       ========================= */

    echo "

    <br>

    <form method='post'
          action='gerarPDF.php'
          target='_blank'>

        <input type='hidden'
               name='acao2'
               value='Mostrar Clientes'>

        <input type='hidden'
               name='pesquisa'
               value='" . htmlspecialchars($pesquisa) . "'>

        <input type='hidden'
               name='administrador'
               value='" . htmlspecialchars($administrador) . "'>

        <input type='submit'
               value='Gerar relatório'>

    </form>

    ";
}



/* =========================================================
   JOGOS
   ========================================================= */

if (!empty($_POST['acao3'])) {

    $pesquisa = "";

    if (isset($_POST['pesquisa'])) {
        $pesquisa = mysql_real_escape_string($_POST['pesquisa']);
    }


    $genero = isset($_POST['genero'])
        ? mysql_real_escape_string($_POST['genero'])
        : '';


    /* =========================
       FORMULÁRIO
       ========================= */

    echo "

    <form method='POST'>

        <input type='text'
               name='pesquisa'
               placeholder='Pesquisar jogo'
               value='" . htmlspecialchars($pesquisa) . "'>


        <select name='genero'>

            <option value=''>-- Todos os gêneros --</option>

    ";


    $sql_genero = "
        SELECT DISTINCT genero
        FROM jogo
        ORDER BY genero
    ";

    $result_genero = mysql_query($sql_genero);


    while ($linha = mysql_fetch_assoc($result_genero)) {

        $selecionado =
            ($genero == $linha['genero'])
            ? "selected"
            : "";

        echo "

            <option value='" . htmlspecialchars($linha['genero']) . "' $selecionado>

                " . htmlspecialchars($linha['genero']) . "

            </option>

        ";
    }


    echo "

        </select>


        <input type='hidden'
               name='acao3'
               value='Mostrar Jogos'>


        <input type='submit'
               value='Pesquisar'>

    </form>

    <br>

    ";


    /* =========================
       SQL JOGOS
       ========================= */

    $sql = "SELECT * FROM jogo WHERE 1=1";


    if ($pesquisa != "") {

        $sql .= "

        AND (

            titulo LIKE '%$pesquisa%'

            OR empresa_email LIKE '%$pesquisa%'

            OR genero LIKE '%$pesquisa%'

        )

        ";

    }


    if ($genero != "") {

        $sql .= "
        AND genero = '$genero'
        ";

    }


    $res = mysql_query($sql);


    /* =========================
       TABELA
       ========================= */

    echo "

    <table border='1'>

        <caption>Informações de Jogos</caption>

        <tr>

            <td>Código</td>
            <td>Título</td>
            <td>Email Empresarial</td>
            <td>Gênero</td>
            <td>Núcleos</td>
            <td>Threads</td>
            <td>Frequência</td>
            <td>RAM (GB)</td>
            <td>VRAM (GB)</td>
            <td>Armazenamento</td>
            <td>Alterar</td>
            <td>Excluir</td>

        </tr>

    ";


    if (mysql_num_rows($res) > 0) {

        while ($linha = mysql_fetch_assoc($res)) {

            $id_jogo = $linha['id_jogo'];
            $titulo = $linha['titulo'];
            $empresa_email = $linha['empresa_email'];
            $genero_resultado = $linha['genero'];
            $nucleos = $linha['nucleos'];
        	$threads = $linha['threads'];
        	$frequencia = $linha['frequencia'];
            $ram_gb = $linha['ram_gb'];
            $vram_gb = $linha['vram_gb'];
            $armazenamento = $linha['armazenamento'];
            echo "

            <tr>

                <td>$id_jogo</td>
                <td>$titulo</td>
                <td>$empresa_email</td>
                <td>$genero_resultado</td>
                <td>$nucleos</td>
                <td>$threads</td>
                <td>$frequencia</td>
                <td>$ram_gb</td>
                <td>$vram_gb</td>
                <td>$armazenamento</td>


                <td>

                    <form method='post'
                          action='alteraJogo.php'>

                        <input type='submit'
                               value='Alterar'
                               name='botao'>

                        <input type='hidden'
                               name='id_jogo'
                               value='$id_jogo'>

                    </form>

                </td>


                <td>

                    <form method='post'
                          action='exclui.php'>

                        <input type='submit'
                               value='Excluir'
                               name='botao'>

                        <input type='hidden'
                               name='id_jogo'
                               value='$id_jogo'>

                    </form>

                </td>

            </tr>

            ";
        }

    } else {

        echo "

        <tr>

            <td colspan='9'>
                Nenhum resultado encontrado.
            </td>

        </tr>

        ";
    }


    echo "</table>";


    /* =========================
       RELATÓRIO
       ========================= */

    echo "

    <br>

    <form method='post'
          action='gerarPDF.php'
          target='_blank'>

        <input type='hidden'
               name='acao3'
               value='Mostrar Jogos'>

        <input type='hidden'
               name='pesquisa'
               value='" . htmlspecialchars($pesquisa) . "'>

        <input type='hidden'
               name='genero'
               value='" . htmlspecialchars($genero) . "'>

        <input type='submit'
               value='Gerar relatório'>

    </form>

    ";
}

?>

<br>

<a href="../index.php">Voltar</a>
<script src="../ASSETS/JS/consulta.js">
            mostrarAcao("<?php echo $acao; ?>");
        </script>
</body>

</html>

