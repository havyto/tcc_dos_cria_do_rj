<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastro.css">
    <title>Cadastro de Empresa</title>
</head>
<body>

<form method="POST" action="gravarCadEmpresa.php">
    <div id="cadastro">
        <h1 class="h1">CADASTRO DE EMPRESA</h1>

        <input type="text" name="razao_social" class="tam" placeholder="Razão Social" maxlength="155" required><br>
        <input type="text" name="nome_fantasia" class="tam" placeholder="Nome Fantasia" maxlength="150" required><br>
        <input type="text" name="cnpj" class="tam" placeholder="CNPJ (somente números)" maxlength="14" required><br>
        <input type="date" name="data_abertura" class="tam"><br>
        <input type="text" name="telefone" class="tam" placeholder="Telefone" maxlength="14"><br>
        <input type="email" name="email" class="tam" placeholder="E-mail" maxlength="255" required><br>
        <input type="text" name="rua" class="tam" placeholder="Rua" maxlength="100"><br>
        <input type="text" name="numero" class="tam" placeholder="Número" maxlength="10"><br>
        <input type="text" name="bairro" class="tam" placeholder="Bairro" maxlength="80"><br>
        <input type="text" name="cidade" class="tam" placeholder="Cidade" maxlength="100"><br>
        <input type="text" name="estado" class="tam" placeholder="Estado (sigla, ex: SP)" maxlength="2"><br>
        <input type="text" name="cep" class="tam" placeholder="CEP (somente números)" maxlength="8"><br>
        <input type="text" name="pais" class="tam" placeholder="País (código, ex: BR)" maxlength="2"><br><br>

        <a href="principal.php" class="button">Voltar</a>
        <input type="submit" class="button" value="GRAVAR">
        <input type="reset" class="button" value="Apagar">
    </div>
</form>

</body>
</html>
