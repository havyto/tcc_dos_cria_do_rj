<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ASSETS/CSS/cadastro.css">
    <title>Cadastro</title>
</head>
<body>
    
    <form method=POST action=gravarcad_Jogo.php class="form">
        <form id="cadastroForm">
        <div id="cadastro">
        <h1 class="h1"> CADASTRO DE JOGO </h1>
          <h1 class="h1">Cadastrar:</h1>
          <input type="text" name="titulo"  class="tam" size="40px" placeholder="Digite o Titulo do Jogo:" required /><br /><br />
          <input type="text" name="empresa_email"  class="tam" size="40px" placeholder="Digite o E-mail Empresarial:" required/><br /><br />
          <input type="text" name="genero"  class="tam" size="40px" placeholder="Digite o Gênero do Jogo:" required/><br /><br />
          <a href="../index.php" class="button">Voltar</a>
          <input type="submit" class="button" value="GRAVAR"/>
          <input type="reset" class="button" value="Apagar" />
        </div>
    
</body>
</html>