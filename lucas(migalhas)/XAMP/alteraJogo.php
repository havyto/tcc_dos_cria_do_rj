<html>
	<head>
		<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ASSETS/CSS/altera.css">
    <title>ALTERAÇÃO DE JOGOS</title>
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
				$cod = $linha['id_jogo'];
				$titulo = $linha['titulo'];
				$empresa_email = $linha['empresa_email'];
				$genero = $linha['genero'];
				$nucleos = $linha['nucleos'];
        		$threads = $linha['threads'];
        		$frequencia = $linha['frequencia'];
				$ram_gb = $linha['ram_gb'];
				$vram_gb = $linha['vram_gb'];
				$armazenamento = $linha['armazenamento'];
			}
		
		?>

        <div class="cadastro-wrapper">
            <div class="form-box cadastro-box">
				<form method="POST" action="altera.php">
					<div class="input-group">
					 <label>Codigo </label><input type="text" name="cod" value="<?php echo"$cod"; ?>" disabled>
					<input type="hidden" name="id_jogo" value="<?php echo"$cod"; ?>">
					</div>
					<div class="input-group">
					 <label>Titulo </label><input type="text" name="titulo" value="<?php echo"$titulo";?>">
					</div>
					<div class="input-group">
					  <label> E-mail Empresarial </label><input type="text" name="empresa_email" value="<?php echo"$empresa_email"; ?>">
					</div>
					<div class="input-group">
								<label>Gênero</label>
								<select name="genero" required class="input-genero">
									<option value="" disabled selected>Selecione o gênero do jogo</option>
									<option value="Ação">Ação</option>
									<option value="Aventura">Aventura</option>
									<option value="RPG">RPG</option>
									<option value="Estratégia">Estratégia</option>
									<option value="Simulação">Simulação</option>
									<option value="Esportes">Esportes</option>
									<option value="Corrida">Corrida</option>
									<option value="Luta">Luta</option>
									<option value="Terror">Terror</option>
									<option value="Sobrevivência">Sobrevivência</option>
									<option value="Plataforma">Plataforma</option>
									<option value="Puzzle">Puzzle</option>
									<option value="Tiro">Tiro</option>
									<option value="Battle Royale">Battle Royale</option>
									<option value="MMORPG">MMORPG</option>
									<option value="MOBA">MOBA</option>
									<option value="Musical">Musical</option>
									<option value="Indie">Indie</option>
								</select>
							</div>
					<div class="input-group">
					 <label>Nucleos </label><input type="number" name="nucleos" value="<?php echo"$nucleos"; ?>">
					</div>
					<div class="input-group">
					 <label>Threads </label><input type="number" name="threads" value="<?php echo"$threads"; ?>">
					</div>
					<div class="input-group">
					 <label>Frequencia </label><input type="number" name="frequencia" value="<?php echo"$frequencia"; ?>">
					</div>
					<div class="input-group">
					 <label>RAM (GB) </label><input type="number" name="ram_gb" value="<?php echo"$ram_gb"; ?>">
					</div>
					<div class="input-group">
					 <label>VRAM (GB) </label><input type="number" name="vram_gb" value="<?php echo"$vram_gb"; ?>">
					</div>
					<div class="input-group">
					 <label>Armazenamento </label><input type="number" name="armazenamento" value="<?php echo"$armazenamento"; ?>">
					</div>
					 <input type="submit" value="GRAVAR">
					<input type="reset" value="LIMPAR">
				</form>
			</div>
		<a href="consulta.php"> - VOLTAR - </a>
	</div>
	</body>
</html>