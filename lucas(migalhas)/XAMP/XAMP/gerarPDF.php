```php
<?php

require_once __DIR__ . "/../vendor/autoload.php";

mysql_connect("localhost", "root", "");
mysql_select_db("ghost_gamer");


/* =========================================================
   DADOS RECEBIDOS
   ========================================================= */

$pesquisa = isset($_POST['pesquisa'])
    ? mysql_real_escape_string($_POST['pesquisa'])
    : '';

$cidade = isset($_POST['cidade'])
    ? mysql_real_escape_string($_POST['cidade'])
    : '';

$estado = isset($_POST['estado'])
    ? mysql_real_escape_string($_POST['estado'])
    : '';

$pais = isset($_POST['pais'])
    ? mysql_real_escape_string($_POST['pais'])
    : '';

$administrador = isset($_POST['administrador'])
    ? mysql_real_escape_string($_POST['administrador'])
    : '';

$genero = isset($_POST['genero'])
    ? mysql_real_escape_string($_POST['genero'])
    : '';

$html = "";


/* =========================================================
   EMPRESAS
   ========================================================= */

if (!empty($_POST['acao1'])) {


    /* =====================================================
       SQL
       ===================================================== */

    $sql = "SELECT * FROM empresa WHERE 1=1";


    /* PESQUISA */

    if ($pesquisa != "") {

        $sql .= "
            AND (
                razao_social LIKE '%$pesquisa%'
                OR nome_fantasia LIKE '%$pesquisa%'
                OR CNPJ LIKE '%$pesquisa%'
                OR email LIKE '%$pesquisa%'
                OR cidade LIKE '%$pesquisa%'
            )
        ";

    }


    /* FILTRO CIDADE */

    if ($cidade != "") {
        $sql .= " AND cidade = '$cidade'";
    }


    /* FILTRO ESTADO */

    if ($estado != "") {
        $sql .= " AND estado = '$estado'";
    }


    /* FILTRO PAÍS */

    if ($pais != "") {
        $sql .= " AND pais = '$pais'";
    }


    $res = mysql_query($sql);


    /* =====================================================
       HTML
       ===================================================== */

    $html = "

    <style>

        body {
            font-family: Arial;
        }

        h1 {
            text-align: center;
            font-size: 20px;
        }

        p {
            text-align: center;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 9px;
        }

        th {
            background-color: #333333;
            color: white;
            padding: 5px;
        }

        td {
            border: 1px solid #000000;
            padding: 4px;
        }

    </style>


    <h1>Relatório de Empresas</h1>
    ";


    /* =====================================================
       MOSTRAR FILTROS UTILIZADOS
       ===================================================== */

    if (
        $pesquisa != "" ||
        $cidade != "" ||
        $estado != "" ||
        $pais != ""
    ) {

        $html .= "<p>";

        if ($pesquisa != "") {
            $html .= "Pesquisa: <b>" . htmlspecialchars($pesquisa) . "</b><br>";
        }

        if ($cidade != "") {
            $html .= "Cidade: <b>" . htmlspecialchars($cidade) . "</b><br>";
        }

        if ($estado != "") {
            $html .= "Estado: <b>" . htmlspecialchars($estado) . "</b><br>";
        }

        if ($pais != "") {
            $html .= "País: <b>" . htmlspecialchars($pais) . "</b>";
        }

        $html .= "</p>";
    }


    $html .= "

    <table>

        <tr>

            <th>Código</th>
            <th>Razão Social</th>
            <th>Nome Fantasia</th>
            <th>CNPJ</th>
            <th>Data de Abertura</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Rua</th>
            <th>Número</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>CEP</th>
            <th>País</th>

        </tr>

    ";


    if (mysql_num_rows($res) > 0) {

        while ($linha = mysql_fetch_assoc($res)) {

            $html .= "

            <tr>

                <td>{$linha['id_empresa']}</td>
                <td>{$linha['razao_social']}</td>
                <td>{$linha['nome_fantasia']}</td>
                <td>{$linha['CNPJ']}</td>
                <td>{$linha['data_abertura']}</td>
                <td>{$linha['telefone']}</td>
                <td>{$linha['email']}</td>
                <td>{$linha['Rua']}</td>
                <td>{$linha['numero']}</td>
                <td>{$linha['bairro']}</td>
                <td>{$linha['cidade']}</td>
                <td>{$linha['estado']}</td>
                <td>{$linha['cep']}</td>
                <td>{$linha['pais']}</td>

            </tr>

            ";
        }

    } else {

        $html .= "

        <tr>

            <td colspan='14' style='text-align:center'>

                Nenhum resultado encontrado.

            </td>

        </tr>

        ";
    }


    $html .= "</table>";
}



/* =========================================================
   CLIENTES
   ========================================================= */

if (!empty($_POST['acao2'])) {


    /* =====================================================
       SQL
       ===================================================== */

    $sql = "SELECT * FROM clientes WHERE 1=1";


    /* PESQUISA */

    if ($pesquisa != "") {

        $sql .= "
            AND (
                cli_nome LIKE '%$pesquisa%'
                OR email LIKE '%$pesquisa%'
                OR nickname LIKE '%$pesquisa%'
            )
        ";

    }


    /* FILTRO ADMINISTRADOR */

    if ($administrador != "") {

        $sql .= "
            AND administrador = '$administrador'
        ";

    }


    $res = mysql_query($sql);


    /* =====================================================
       HTML
       ===================================================== */

    $html = "

    <style>

        body {
            font-family: Arial;
        }

        h1 {
            text-align: center;
            font-size: 20px;
        }

        p {
            text-align: center;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10px;
        }

        th {
            background-color: #333333;
            color: white;
            padding: 6px;
        }

        td {
            border: 1px solid #000000;
            padding: 5px;
        }

    </style>


    <h1>Relatório de Clientes</h1>

    ";


    /* =====================================================
       MOSTRAR FILTROS
       ===================================================== */

    if (
        $pesquisa != "" ||
        $administrador != ""
    ) {

        $html .= "<p>";

        if ($pesquisa != "") {

            $html .= "
                Pesquisa:
                <b>" . htmlspecialchars($pesquisa) . "</b>
                <br>
            ";

        }

        if ($administrador != "") {

            $html .= "
                Tipo de usuário:
                <b>" . htmlspecialchars($administrador) . "</b>
            ";

        }

        $html .= "</p>";
    }


    $html .= "

    <table>

        <tr>

            <th>Código</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Nickname</th>
            <th>Administrador</th>

        </tr>

    ";


    if (mysql_num_rows($res) > 0) {

        while ($linha = mysql_fetch_assoc($res)) {

            $html .= "

            <tr>

                <td>{$linha['id_cliente']}</td>
                <td>{$linha['cli_nome']}</td>
                <td>{$linha['email']}</td>
                <td>{$linha['nickname']}</td>
                <td>{$linha['administrador']}</td>

            </tr>

            ";
        }

    } else {

        $html .= "

        <tr>

            <td colspan='5' style='text-align:center'>

                Nenhum resultado encontrado.

            </td>

        </tr>

        ";
    }


    $html .= "</table>";
}



/* =========================================================
   JOGOS
   ========================================================= */

if (!empty($_POST['acao3'])) {


    /* =====================================================
       SQL
       ===================================================== */

    $sql = "SELECT * FROM jogo WHERE 1=1";


    /* PESQUISA */

    if ($pesquisa != "") {

        $sql .= "

            AND (

                titulo LIKE '%$pesquisa%'

                OR empresa_email LIKE '%$pesquisa%'

                OR genero LIKE '%$pesquisa%'

            )

        ";

    }


    /* FILTRO GÊNERO */

    if ($genero != "") {

        $sql .= "
            AND genero = '$genero'
        ";

    }


    $res = mysql_query($sql);


    /* =====================================================
       HTML
       ===================================================== */

    $html = "

    <style>

        body {
            font-family: Arial;
        }

        h1 {
            text-align: center;
            font-size: 20px;
        }

        p {
            text-align: center;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10px;
        }

        th {
            background-color: #333333;
            color: white;
            padding: 6px;
        }

        td {
            border: 1px solid #000000;
            padding: 5px;
        }

    </style>


    <h1>Relatório de Jogos</h1>

    ";


    /* =====================================================
       MOSTRAR FILTROS
       ===================================================== */

    if (
        $pesquisa != "" ||
        $genero != ""
    ) {

        $html .= "<p>";

        if ($pesquisa != "") {

            $html .= "
                Pesquisa:
                <b>" . htmlspecialchars($pesquisa) . "</b>
                <br>
            ";

        }

        if ($genero != "") {

            $html .= "
                Gênero:
                <b>" . htmlspecialchars($genero) . "</b>
            ";

        }

        $html .= "</p>";
    }


    $html .= "

    <table>

        <tr>

            <th>Código</th>
            <th>Título</th>
            <th>Email Empresarial</th>
            <th>Gênero</th>
            <th>RAM (GB)</th>
            <th>VRAM (GB)</th>
            <th>Armazenamento</th>

        </tr>

    ";


    if (mysql_num_rows($res) > 0) {

        while ($linha = mysql_fetch_assoc($res)) {

            $html .= "

            <tr>

                <td>{$linha['id_jogo']}</td>
                <td>{$linha['titulo']}</td>
                <td>{$linha['empresa_email']}</td>
                <td>{$linha['genero']}</td>
                <td>{$linha['ram_gb']}</td>
                <td>{$linha['vram_gb']}</td>
                <td>{$linha['armazenamento']}</td>

            </tr>

            ";
        }

    } else {

        $html .= "

        <tr>

            <td colspan='7' style='text-align:center'>

                Nenhum resultado encontrado.

            </td>

        </tr>

        ";
    }


    $html .= "</table>";
}



/* =========================================================
   GERAR PDF
   ========================================================= */

$mpdf = new mPDF(
    'utf-8',
    'A4-L'
);

$mpdf->SetTitle('Relatório Ghost Gamer');

$mpdf->SetAuthor('Ghost Gamer');

$mpdf->WriteHTML($html);

$mpdf->Output(
    'relatorio_ghost_gamer.pdf',
    'I'
);

?>
```
