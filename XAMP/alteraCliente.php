<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../ASSETS/CSS/altera.css">
        <title>ALTERAÇÃO DE CLIENTES</title>
    </head>

    <body>

        <h1>ALTERAÇÃO DE CLIENTES</h1>

        <?php 
            error_reporting(E_ALL ^ E_DEPRECATED);

            mysql_connect("localhost", "root", "");
            mysql_select_db("ghost_gamer");

            $cod = $_POST['id_cliente'];

            $sql = "SELECT * FROM clientes WHERE id_cliente = $cod";

            $resultado = mysql_query($sql);

            while ($linha = mysql_fetch_array($resultado))
            {
                $cod = $linha['id_cliente'];
                $nome = $linha['cli_nome'];
                $email = $linha['email'];
                $nickname = $linha['nickname'];
                $administrador = $linha['administrador'];
            }
        ?>

        <div class="cadastro-wrapper">

            <div class="form-box cadastro-box">

                <form method="POST" action="altera.php">

                    <div class="input-group">
                        <label>Código = </label>
                        <input type="text" name="cod" value="<?php echo $cod; ?>" disabled>

                        <input type="hidden" name="id_cliente" value="<?php echo $cod; ?>">
                    </div>

                    <div class="input-group">
                        <label>Nome = </label>
                        <input type="text" name="cli_nome" value="<?php echo $nome; ?>">
                    </div>

                    <div class="input-group">
                        <label>E-mail = </label>
                        <input type="text" name="email" value="<?php echo $email; ?>">
                    </div>

                    <div class="input-group">
                        <label>Nickname = </label>
                        <input type="text" name="nickname" value="<?php echo $nickname; ?>">
                    </div>

                    <div class="input-group">

                        <label>Tipo de usuário</label>

                        <select name="administrador" required class="input-genero">

                            <option value="" disabled>
                                Selecione o tipo de usuário
                            </option>

                            <option value="admin"
                                <?php if ($administrador == "admin") echo "selected"; ?>>
                                Admin
                            </option>

                            <option value="usuario"
                                <?php if ($administrador == "usuario") echo "selected"; ?>>
                                Usuário
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

            <a href="consulta.php">- VOLTAR -</a>

        </div>

    </body>
</html>