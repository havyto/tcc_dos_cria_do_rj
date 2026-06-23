<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ASSETS/CSS/cadastro.css">
    <title>Cadastro</title>
</head>
<body>
    
    <form method=POST action=gravarcad.php class="form">
        <form id="cadastroForm">
        <div id="cadastro">
        <h1 class="h1"> CADASTRO DE EMPRESA </h1>
          <h1 class="h1">Cadastrar:</h1>
          <input type="text" name="razao_social"  class="tam" size="40px" placeholder="Digite sua Razão Social:" required /><br /><br />
          <input type="text" name="nome_fantasia"  class="tam" size="40px" placeholder="Digite seu Nome Fantasia:" required/><br /><br />
          <input type="text" name="CNPJ"  class="tam" size="40px" placeholder="Digite seu CNPJ:" required/><br /><br />
          Sua data de ABERTURA<br>
          <input type="date" name="data_abertura"  class="tam" width="100px" placeholder="Digite sua Data de Abertura:" required/><br /><br />
          <input type="text" name="telefone"  class="tam" size="40px" placeholder="Digite seu Telefone:" required /><br /><br />
          <input type="text" name="email" class="tam" size="40px" placeholder="Digite seu E-mail" required/><br /><br />
          <input type="text" name="Rua"  class="tam" size="40px" placeholder="Digite sua Rua" required/><br /><br />
          <input type="text" name="numero"  class="tam" size="40px" placeholder="Digite seu Numero" required/><br /><br />
          <input type="text" name="bairro"  class="tam" size="40px" placeholder="Digite seu Bairro" required/><br /><br />
          <input type="text" name="cidade"  class="tam" size="40px" placeholder="Digite sua Cidade" required/><br /><br />
          <input type="text" name="estado"  class="tam" size="40px" placeholder="Digite seu Estado" required/><br /><br />
          <input type="text" name="cep"  class="tam" size="40px" placeholder="Digite seu CEP" required/><br /><br />
          <input type="text" name="pais"  class="tam" size="40px" placeholder="Digite seu Pais" required/><br /><br />


          <a href="principal.php" class="button">Voltar</a>
          <input type="submit" class="button" value="GRAVAR"/>
          <input type="reset" class="button" value="Apagar" />
        </div>
    
</body>
</html>