<html>
    <head>
        <meta charset="UTF-8">
        <title>Consulta no Banco</title>
        <link rel="stylesheet" href="../ASSETS/CSS/consulta.css">
    </head>
    <body>
        <h1>Exibição de Dados</h1>
    
        <form method="POST">
        <br><br>
            <input type="hidden" name="acao" id="acao">

            <input type="button"
                name="acao1"
                id="empresa"
                value="Mostrar Empresas"
                onclick="mostrarAcao('empresa')">

            <input type="button"
                name="acao2"
                id="cliente"
                value="Mostrar Clientes"
                onclick="mostrarAcao('cliente')">

            <input type="button"
                name="acao3"
                id="jogo"
                value="Mostrar Jogos"
                onclick="mostrarAcao('jogo')">

            <hr>

            <label class="empresa" hidden>Cidade:</label>

            <select name="cidade" class="empresa" hidden>

            <option value="">-- Todas --</option>

            <?php
                error_reporting(0);

                mysql_connect("localhost", "root", "");
                mysql_select_db("ghost_gamer");

                $sql_cid = "SELECT DISTINCT cidade FROM empresa ORDER BY cidade";

                $result_cidade = mysql_query($sql_cid);

                while ($linha = mysql_fetch_assoc($result_cidade)) {

                    echo "<option value='" . $linha['cidade'] . "'>"
                        . $linha['cidade'] .
                        "</option>";
                }
            ?>
            </select>

            <label class="empresa" hidden>Estado:</label>

            <select name="estado" class="empresa" hidden>

            <option value="">-- Todos --</option>

            <?php
                $sql_est = "SELECT DISTINCT estado FROM empresa ORDER BY estado";

                $result_estado = mysql_query($sql_est);

                while ($linha = mysql_fetch_assoc($result_estado)) {

                    echo "<option value='" . $linha['estado'] . "'>"
                        . $linha['estado'] .
                        "</option>";
                }
            ?>
            </select>

            <label class="empresa" hidden>País:</label>

            <select name="pais" class="empresa" hidden>

            <option value="">-- Todos --</option>

            <?php
                $sql_na = "SELECT DISTINCT pais FROM empresa ORDER BY pais";

                $result_pais = mysql_query($sql_na);

                while ($linha = mysql_fetch_assoc($result_pais)) {

                    echo "<option value='" . $linha['pais'] . "'>"
                        . $linha['pais'] .
                        "</option>";
                }
            ?>
            </select>

            <label class="cliente" hidden>Tipo de usuário:</label>

            <select name="administrador" class="cliente" hidden>

            <option value="">-- Todos --</option>

            <?php
                $sql_usu = "SELECT DISTINCT administrador FROM clientes ORDER BY administrador";

                $result_tipo_usuario = mysql_query($sql_usu);

                while ($linha = mysql_fetch_assoc($result_tipo_usuario)) {

                    echo "<option value='" . $linha['administrador'] . "'>"
                        . $linha['administrador'] .
                        "</option>";
                }
            ?>

            </select>

            <label class="jogo" hidden>Gênero:</label>

            <select name="genero" class="jogo" hidden>

            <option value="">-- Todos --</option>

            <?php
                $sql_genero = "SELECT DISTINCT genero FROM jogos ORDER BY genero";

                $result_genero = mysql_query($sql_genero);

                while ($linha = mysql_fetch_assoc($result_genero)) {

                    echo "<option value='" . $linha['genero'] . "'>"
                        . $linha['genero'] .
                        "</option>";
                }
            ?>

            </select>

            <button type="submit">Filtrar</button>
        </form>
        <hr>
 
    <?php
    $acao = isset($_POST['acao']) ? $_POST['acao'] : '';

    if ($acao == "empresa"){

        $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
        $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
        $pais = isset($_POST['pais']) ? $_POST['pais'] : '';

        $sql = "SELECT * FROM empresa where 1=1";

        if ($cidade != "") {
                $sql .= " AND cidade = '$cidade'";
            }
        if ($estado != "") {
                $sql .= " AND estado = '$estado'";
            }
        if ($pais != "") {
                $sql .= " AND pais = '$pais'";
            }
        
        $result = mysql_query($sql);

        
        echo "<table>
        <caption>Informações de Empresas</caption>
        <tr>
            <th> Código </th>
            <th> Razão Social </th>
            <th> Nome Fantasia </th>
            <th> CNPJ </th>
            <th> Data de Abertura </th>
            <th> Telefone </th>
            <th> Email </th>
            <th> Rua </th>
            <th> Numero </th>
            <th> Bairro </th>
            <th> Cidade </th>
            <th> Estado </th>
            <th> CEP </th>
            <th> Pais </th>
            <th> Alterar </th>
            <th> Excluir </th>
        </tr>";
        if (mysql_num_rows($result) > 0) {
            while ($linha = mysql_fetch_assoc($result)) {
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
            <th> $id_empresa </th>
            <th> $razao_social </th>
            <th> $nome_fantasia </th>
            <th> $CNPJ </th>
            <th> $data_abertura </th>
            <th> $telefone </th>
            <th> $email </th>
            <th> $Rua </th>
            <th> $numero </th>
            <th> $bairro </th>
            <th> $cidade </th>
            <th> $estado </th>
            <th> $cep </th>
            <th> $pais </th>
            <th>
                <form method=post action=alteraEmpresa.php>
                    <input type=submit value='Alterar' name='botao'>
                    <input type=hidden name='id_empresa' value='$id_empresa'>
                </form>
            </th>
            <th>
                <form method=post action=exclui.php>
                    <input type=submit value='Excluir' name='botao'>
                    <input type=hidden name='id_empresa' value='$id_empresa'>
                </form>
            </th>

        </tr>";
        
            }
        }else {
            echo "Nenhum resultado encontrado.";
        }
        echo "
        <form method='post' action='consulta2.php' target='_blank'>

            <input type='hidden' name='acao' value='$acao'>

            <input type='hidden' name='cidade' value='$cidade'>

            <input type='hidden' name='estado' value='$estado'>

            <input type='hidden' name='pais' value='$pais'>

            <input type='submit' value='Gerar relatório'>

        </form>
        ";}

    if ($acao == "jogo"){

        $genero = isset($_POST['genero']) ? $_POST['genero'] : '';

        $sql = "SELECT * FROM jogo where 1=1";

        if ($genero != "") {
                $sql .= " AND genero = '$genero'";
            }
        
        $result = mysql_query($sql);


        
        echo "<table>
        <caption>Informações de Empresas</caption>
        <tr>
            <th> Código </th>
            <th> Titulo </th>
            <th> Email Empresarial </th>
            <th> Genero </th>
            <th> RAM (GB) </th>
            <th> VRAM (GB) </th>
            <th> Armazenamento </th>
            <th> Alterar </th>
            <th> Excluir </th>
        </tr>";
        if (mysql_num_rows($result) > 0) {
            while ($linha = mysql_fetch_assoc($result)) {
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
        echo "
        <form method='post' action='consulta2.php' target='_blank'>

            <input type='hidden' name='acao' value='$acao'>

            <input type='hidden' name='genero' value='$genero'>

            <input type='submit' value='Gerar relatório'>

        </form>
        ";
    };

    if ($acao == "cliente"){

        $administrador = isset($_POST['administrador']) ? $_POST['administrador'] : '';

        $sql = "SELECT * FROM clientes where 1=1";

        if ($administrador != "") {
                $sql .= " AND administrador = '$administrador'";
            }
        
        $result = mysql_query($sql);
        
        echo "<table>
        <caption> Informações de Clientes</caption>
        <tr>
            <th> Código </th>
            <th> Nome </th>
            <th> Email </th>
            <th> Nickname </th>
            <th> Administrador </th>
            <th> Alterar </th>
            <th> Excluir </th>
        </tr>";
        if (mysql_num_rows($result) > 0) {
            while ($linha = mysql_fetch_assoc($result)) {
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
            <th>
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
            </th>

        </tr>";
        
            }
        }else {
            echo "Nenhum resultado encontrado.";
        }
        echo "
        <form method='post' action='consulta2.php' target='_blank'>

            <input type='hidden' name='acao' value='$acao'>

            <input type='hidden' name='administrador' value='$administrador'>
            
            <input type='submit' value='Gerar relatório'>

        </form>
        ";}
    ?>
    <a href="../index.php">Voltar</a>
        <script src="../ASSETS/JS/consulta.js">
            mostrarAcao("<?php echo $acao; ?>");
        </script>
</body>
</html>