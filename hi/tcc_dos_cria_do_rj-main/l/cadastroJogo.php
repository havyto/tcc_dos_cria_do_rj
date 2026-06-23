<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastro.css">
    <title>Cadastro de Jogo</title>
</head>
<body>

<form method="POST" action="gravarCadJogo.php">
    <div id="cadastro">
        <h1 class="h1">CADASTRO DE JOGO</h1>

        <input type="text" name="titulo" class="tam" placeholder="Nome do Jogo" required><br>
        <input type="text" name="contato" class="tam" placeholder="Contato (e-mail) da Empresa"><br>

        <div class="checkbox-group">
            <p>Categoria do Jogo:</p>
            <label><input type="checkbox" name="genero[]" value="acao"> Ação</label><br>
            <label><input type="checkbox" name="genero[]" value="misterio"> Mistério</label><br>
            <label><input type="checkbox" name="genero[]" value="terror"> Terror</label><br>
            <label><input type="checkbox" name="genero[]" value="rpg"> Rpg</label><br>
            <label><input type="checkbox" name="genero[]" value="ficcao"> Ficção</label><br>
            <label><input type="checkbox" name="genero[]" value="esporte"> Esporte</label><br>
            <label><input type="checkbox" name="genero[]" value="fps"> Fps</label><br>
            <label><input type="checkbox" name="genero[]" value="luta"> Luta</label><br>
        </div>
        <br>

        <a href="principal.php" class="button">Voltar</a>
        <input type="submit" class="button" value="GRAVAR">
        <input type="reset" class="button" value="Apagar">
    </div>
</form>

</body>
</html>
