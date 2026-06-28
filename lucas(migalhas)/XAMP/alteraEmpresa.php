<html>
	<head>
		<title> ALTERAÇÃO DE EMPRESAS </title>
		<meta charset="UTF-8">
	</head>
	<body>
		<h1> ALTERAÇÃO DE EMPRESAS </h1>
		<?php 
			error_reporting(E_ALL ^ E_DEPRECATED);
			$id = mysql_connect ("localhost", "root", "");
			$con = mysql_select_db ("ghost_gamer", $id);
			$cod = $_POST['id_empresa'];
			$sql = "Select * from empresa where id_empresa = $cod";
			$resultado = mysql_query($sql);
			While ($linha = mysql_fetch_array($resultado))
			{
				$cod = $linha[0];
				$razao_social = $linha[1];
				$nome_fantasia = $linha[2];
				$CNPJ = $linha[3];
				$data_abertura = $linha[4];
				$telefone = $linha[5];
				$email = $linha[6];
				$Rua = $linha[7];
				$numero = $linha[8];
				$bairro = $linha[9];
				$cidade = $linha[10];
				$estado = $linha[11];
				$cep = $linha[12];
				$pais = $linha[13];
			}
		
		?>
		<form method=POST action=alteraEmpresa2.php>
			<br> Codigo = <input type=text name=cod value="<?php echo"$cod"; ?>" disabled>
			<br><input type=hidden name=id_empresa value="<?php echo"$cod"; ?>">
			<br> Razão Social = <input type=text name=razao_social value="<?php echo"$razao_social";?>">
			<br> Nome Fantasia = <input type=text name=nome_fantasia value="<?php echo"$nome_fantasia"; ?>">
			<br> CNPJ = <input type=text name=CNPJ value="<?php echo"$CNPJ"; ?>">
			<br> Data de Abertura = <input type=date name=data_abertura value="<?php echo"$data_abertura"; ?>">
			<br> Telefone = <input type=text name=telefone value="<?php echo"$telefone"; ?>">
			<br> Email = <input type=text name=email value="<?php echo"$email"; ?>">
			<br> Rua = <input type=text name=Rua value="<?php echo"$Rua"; ?>">
			<br> Número = <input type=text name=numero value="<?php echo"$numero"; ?>">
			<br> Bairro = <input type=text name=bairro value="<?php echo"$bairro"; ?>">
			<br> Cidade = <input type=text name=cidade value="<?php echo"$cidade"; ?>">
			<br> Estado = <input type=text name=estado value="<?php echo"$estado"; ?>">
			<br> CEP = <input type=text name=cep value="<?php echo"$cep"; ?>">
			<br> País = <input type=text name=pais value="<?php echo"$pais"; ?>">
			<br> <input type=submit value=GRAVAR>
			<input type=reset value=LIMPAR>
			<br>
		</form>
		<br><br><a href="consulta.php"> - VOLTAR - </a>
	</body>
</html>