<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../ASSETS/CSS/altera.css">
        <title>ALTERAÇÃO DE EMPRESAS</title>
    </head>

    <body>

        <h1> ALTERAÇÃO DE EMPRESAS </h1>

        <?php 
            error_reporting(E_ALL ^ E_DEPRECATED);

            $id = mysql_connect("localhost", "root", "");
            $con = mysql_select_db("ghost_gamer", $id);

            $cod = $_POST['id_empresa'];

            $sql = "Select * from empresa where id_empresa = $cod";

            $resultado = mysql_query($sql);

            While ($linha = mysql_fetch_array($resultado))
            {
                $cod = $linha['id_empresa'];
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
            }
        ?>

        <div class="cadastro-wrapper">

            <div class="form-box cadastro-box">

                <form method="POST" action="altera.php">

                    <div class="input-group">
                        <br>
                        <label>Codigo</label>
                        <input type="text" name="cod" value="<?php echo "$cod"; ?>" disabled>

                        <br>
                        <input type="hidden" name="id_empresa" value="<?php echo "$cod"; ?>">
                    </div>

                    <div class="input-group">
                        <br>
                        <label>Razão Social</label>
                        <input type="text" name="razao_social" value="<?php echo "$razao_social"; ?>">
                    </div>

                    <div class="input-group">
                        <br>
                        <label>Nome Fantasia</label>
                        <input type="text" name="nome_fantasia" value="<?php echo "$nome_fantasia"; ?>">
                    </div>

                    <div class="input-group">
                        <br>
                        <label>CNPJ</label>
                        <input type="text" name="CNPJ" value="<?php echo "$CNPJ"; ?>">
                    </div>

                    <div class="input-group">
                        <br>
                        <label>Data de Abertura</label>
                        <input type="date" name="data_abertura" value="<?php echo "$data_abertura"; ?>">
                    </div>

                    <div class="input-group">
                        <br>
                        <label>Telefone</label>
                        <input type="text" name="telefone" value="<?php echo "$telefone"; ?>">
                    </div>

                    <div class="input-group">
                        <br>
                        <label>Email</label>
                        <input type="text" name="email" value="<?php echo "$email"; ?>">
                    </div>

                    <div class="input-group">
                        <br>
                        <label>Rua</label>
                        <input type="text" name="Rua" value="<?php echo "$Rua"; ?>">
                    </div>

                    <div class="input-group">
                        <br>
                        <label>Número</label>
                        <input type="text" name="numero" value="<?php echo "$numero"; ?>">
                    </div>

                    <div class="input-group">
                        <br>
                        <label>Bairro</label>
                        <input type="text" name="bairro" value="<?php echo "$bairro"; ?>">
                    </div>

                    <div class="input-group">
                        <br>
                        <label>Cidade</label>
                        <input type="text" name="cidade" value="<?php echo "$cidade"; ?>">
                    </div>

                    <div class="input-group">

                        <label>Estado</label>

                        <select name="estado" required class="input-genero">

                            <option value="" disabled>
                                Selecione o Estado
                            </option>

                            <option value="AC" <?php if ($estado == "AC") echo "selected"; ?>>AC</option>
                            <option value="AL" <?php if ($estado == "AL") echo "selected"; ?>>AL</option>
                            <option value="AP" <?php if ($estado == "AP") echo "selected"; ?>>AP</option>
                            <option value="AM" <?php if ($estado == "AM") echo "selected"; ?>>AM</option>
                            <option value="BA" <?php if ($estado == "BA") echo "selected"; ?>>BA</option>
                            <option value="CE" <?php if ($estado == "CE") echo "selected"; ?>>CE</option>
                            <option value="DF" <?php if ($estado == "DF") echo "selected"; ?>>DF</option>
                            <option value="ES" <?php if ($estado == "ES") echo "selected"; ?>>ES</option>
                            <option value="GO" <?php if ($estado == "GO") echo "selected"; ?>>GO</option>
                            <option value="MA" <?php if ($estado == "MA") echo "selected"; ?>>MA</option>
                            <option value="MT" <?php if ($estado == "MT") echo "selected"; ?>>MT</option>
                            <option value="MS" <?php if ($estado == "MS") echo "selected"; ?>>MS</option>
                            <option value="MG" <?php if ($estado == "MG") echo "selected"; ?>>MG</option>
                            <option value="PA" <?php if ($estado == "PA") echo "selected"; ?>>PA</option>
                            <option value="PB" <?php if ($estado == "PB") echo "selected"; ?>>PB</option>
                            <option value="PR" <?php if ($estado == "PR") echo "selected"; ?>>PR</option>
                            <option value="PE" <?php if ($estado == "PE") echo "selected"; ?>>PE</option>
                            <option value="PI" <?php if ($estado == "PI") echo "selected"; ?>>PI</option>
                            <option value="RJ" <?php if ($estado == "RJ") echo "selected"; ?>>RJ</option>
                            <option value="RN" <?php if ($estado == "RN") echo "selected"; ?>>RN</option>
                            <option value="RS" <?php if ($estado == "RS") echo "selected"; ?>>RS</option>
                            <option value="RO" <?php if ($estado == "RO") echo "selected"; ?>>RO</option>
                            <option value="RR" <?php if ($estado == "RR") echo "selected"; ?>>RR</option>
                            <option value="SC" <?php if ($estado == "SC") echo "selected"; ?>>SC</option>
                            <option value="SP" <?php if ($estado == "SP") echo "selected"; ?>>SP</option>
                            <option value="SE" <?php if ($estado == "SE") echo "selected"; ?>>SE</option>
                            <option value="TO" <?php if ($estado == "TO") echo "selected"; ?>>TO</option>

                        </select>

                    </div>

                    <div class="input-group">
                        <br>
                        <label>CEP</label>
                        <input type="text" name="cep" value="<?php echo "$cep"; ?>">
                    </div>

                    <div class="input-group">

                        <label>País</label>

                        <select name="pais" required class="input-genero">

                            <option value="" disabled>
                                Selecione o PAÍS
                            </option>

                            <option value="brasil"
                                <?php if ($pais == "brasil") echo "selected"; ?>>
                                Brasil
                            </option>

                            <option value="outros"
                                <?php if ($pais == "outros") echo "selected"; ?>>
                                Outros
                            </option>

                        </select>

                    </div>

                    <br>

                    <input type="submit" value="GRAVAR">

                    <input type="reset" value="LIMPAR">

                    <br>

                </form>

            </div>

            <br><br>

            <a href="consulta.php"> - VOLTAR - </a>

        </div>

    </body>
</html>