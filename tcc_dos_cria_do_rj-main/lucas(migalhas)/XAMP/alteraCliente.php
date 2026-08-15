<html>
	<head>
		<title> ALTERAÇÃO DE CLIENTES </title>
		<meta charset="UTF-8">
	</head>
	<body>
		<h1> ALTERAÇÃO DE CLIENTES </h1>
		<?php 
			error_reporting(E_ALL ^ E_DEPRECATED); //ESCONDE ERROS DE COD ANTIGO
			$id = mysql_connect ("localhost", "root", "");
			$con = mysql_select_db ("ghost_gamer", $id);
			$cod = $_POST['id_cliente'];
			$sql = "Select * from clientes where id_cliente = $cod";
			$resultado = mysql_query($sql);
			While ($linha = mysql_fetch_array($resultado))
			{
				$cod = $linha[0];
				$nome = $linha[1];
				$email = $linha[2];
				$nickname = $linha[3];
				$senha = $linha[4];
				$administrador = $linha[5];
			}
		
		?>
		<form method=POST action=altera.php>
			<br> Codigo = <input type=text name=cod value="<?php echo"$cod"; ?>" disabled>
			<br><input type=hidden name=id_cliente value="<?php echo"$cod"; ?>">
			<br> Nome = <input type=text name=cli_nome value="<?php echo"$nome";?>">
			<br> E-mail = <input type=text name=email value="<?php echo"$email"; ?>">
			<br> Nickname = <input type=text name=nickname value="<?php echo"$nickname"; ?>">
			<br> Senha = <input type=text name=senha value="<?php echo"$senha"; ?>">
			<br> Administrador = <input type=text name=administrador value="<?php echo"$administrador"; ?>">
			<br> <input type=submit value=GRAVAR>
			<input type=reset value=LIMPAR>
			<br>
		</form>
		<br><br><a href="consulta.php"> - VOLTAR - </a>
	</body>
</html>