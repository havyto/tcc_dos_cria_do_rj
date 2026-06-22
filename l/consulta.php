<?php
/**
 * Consulta Geral - mostra, na MESMA página, os cadastros de
 * Clientes, Empresas e Jogos, em formato de tabela simples.
 * mysqli (sem mysql_query) e sem dados de usuário dentro do SQL,
 * então não há risco de SQL Injection nesta página.
 */

require_once "conexao.php";

$tabelas = [
    "Clientes Cadastrados" =>
        "SELECT id_cliente, cli_nome, email, nickname
         FROM clientes
         ORDER BY id_cliente",

    "Empresas Cadastradas" =>
        "SELECT id_empresa, razao_social, nome_fantasia, CNPJ, data_abertura,
                telefone, email, Rua, numero, bairro, cidade, estado, cep, pais
         FROM empresa
         ORDER BY id_empresa",

    "Jogos Cadastrados" =>
        "SELECT id_jogo, titulo, empresa_email, genero
         FROM jogo
         ORDER BY id_jogo",
];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Consulta Geral - Ghost Gamer</title>
</head>
<body>

<h1>Consulta Geral - Ghost Gamer</h1>

<?php foreach ($tabelas as $titulo => $sql): ?>

    <h2><?php echo htmlspecialchars($titulo); ?></h2>

    <?php
    $resultado = mysqli_query($conexao, $sql);

    if (!$resultado) {
        echo "<p>Erro ao consultar: " . htmlspecialchars(mysqli_error($conexao)) . "</p>";
        continue;
    }

    if (mysqli_num_rows($resultado) === 0) {
        echo "<p>Nenhum registro encontrado.</p><br>";
        continue;
    }

    $campos = mysqli_fetch_fields($resultado);
    ?>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <?php foreach ($campos as $campo): ?>
                <th><?php echo htmlspecialchars($campo->name); ?></th>
            <?php endforeach; ?>
        </tr>

        <?php while ($linha = mysqli_fetch_assoc($resultado)): ?>
        <tr>
            <?php foreach ($linha as $valor): ?>
                <td><?php echo htmlspecialchars($valor ?? ''); ?></td>
            <?php endforeach; ?>
        </tr>
        <?php endwhile; ?>
    </table>

    <br><br>

<?php endforeach; ?>

<a href="principal.php">Voltar</a>

</body>
</html>
<?php mysqli_close($conexao); ?>
