<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ASSETS/CSS/cadastro.css">
    <title>Cadastro</title>
</head>
<body>
    
    <form method=POST action=gravarcad_Cliente.php class="form">
        <form id="cadastroForm">
        <div id="cadastro">
        <h1 class="h1"> CADASTRO DE Cliente </h1>
          <h1 class="h1">Cadastrar:</h1>
          <input type="text" name="cli_nome"  class="tam" size="40px" placeholder="Digite seu Nome:" required /><br /><br />
          <input type="email" name="email"  class="tam" size="40px" placeholder="Digite seu E-mail:" required/><br /><br />
          <input type="text" name="nickname"  class="tam" size="40px" placeholder="Digite seu nickname:" required/><br /><br />
          <input type="password" name="senha"  class="tam" width="100px" placeholder="Digite sua Senha:" required/><br /><br />
          <a href="../index.php" class="button">Voltar</a>
          <input type="submit" class="button" value="GRAVAR"/>
          <input type="reset" class="button" value="Apagar" />
        </div>
    
</body>
</html>