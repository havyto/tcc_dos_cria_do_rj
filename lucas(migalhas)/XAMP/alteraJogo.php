<html>
	<head>
		<title> ALTERAÇÃO DE JOGOS </title>
		<meta charset="UTF-8">
	</head>
	<body>
		<h1> ALTERAÇÃO DE JOGOS </h1>
		<?php 
			error_reporting(E_ALL ^ E_DEPRECATED);
			$id = mysql_connect ("localhost", "root", "");
			$con = mysql_select_db ("ghost_gamer", $id);
			$cod = $_POST['id_jogo'];
			$sql = "Select * from jogo where id_jogo = $cod";
			$resultado = mysql_query($sql);
			While ($linha = mysql_fetch_array($resultado))
			{
				$cod = $linha[0];
				$titulo = $linha[1];
				$empresa_email = $linha[2];
				$genero = $linha[3];
				$ram_gb = $linha[4];
				$vram_gb = $linha[5];
				$armazenamento = $linha[6];
			}
		
		?>
		<form method=POST action=altera.php>
			<br> Codigo = <input type=text name=cod value="<?php echo"$cod"; ?>" disabled>
			<br><input type=hidden name=id_jogo value="<?php echo"$cod"; ?>">
			<br> Titulo = <input type=text name=titulo value="<?php echo"$titulo";?>">
			<br> E-mail Empresarial = <input type=text name=empresa_email value="<?php echo"$empresa_email"; ?>">
			<br> Genero = <input type=text name=genero value="<?php echo"$genero"; ?>">
			<br> RAM (GB) = <input type=text name=ram_gb value="<?php echo"$ram_gb"; ?>">
			<br> VRAM (GB) = <input type=text name=vram_gb value="<?php echo"$vram_gb"; ?>">
			<br> Armazenamento = <input type=text name=armazenamento value="<?php echo"$armazenamento"; ?>">
			<br> <input type=submit value=GRAVAR>
			<input type=reset value=LIMPAR>
			<br>
		</form>
		<br><br><a href="consulta.php"> - VOLTAR - </a>
	</body>
</html>