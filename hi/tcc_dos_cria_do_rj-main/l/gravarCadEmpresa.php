<?php
/**
 * Grava o cadastro de empresa - mysqli + prepared statement + validação
 * dos campos obrigatórios da tabela `empresa`.
 */

require_once "conexao.php";

$razao_social  = trim($_POST['razao_social']  ?? '');
$nome_fantasia = trim($_POST['nome_fantasia'] ?? '');
$cnpj          = preg_replace('/\D/', '', $_POST['cnpj'] ?? '');       // só números
$data_abertura = trim($_POST['data_abertura'] ?? '');
$telefone      = preg_replace('/\D/', '', $_POST['telefone'] ?? '');   // só números
$email         = trim($_POST['email'] ?? '');
$rua           = trim($_POST['rua'] ?? '');
$numero        = trim($_POST['numero'] ?? '');
$bairro        = trim($_POST['bairro'] ?? '');
$cidade        = trim($_POST['cidade'] ?? '');
$estado        = trim($_POST['estado'] ?? '');
$cep           = preg_replace('/\D/', '', $_POST['cep'] ?? '');       // só números
$pais          = trim($_POST['pais'] ?? '');

$erros = [];

if ($razao_social === '')  $erros[] = "Razão Social é obrigatória.";
if ($nome_fantasia === '') $erros[] = "Nome Fantasia é obrigatório.";
if ($cnpj === '')          $erros[] = "CNPJ é obrigatório.";
if (strlen($cnpj) > 14)    $erros[] = "CNPJ inválido (máx. 14 números, sem pontos/barras).";
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erros[] = "Email inválido.";
}
if ($telefone !== '' && strlen($telefone) > 14) $erros[] = "Telefone inválido (máx. 14 números).";
if ($estado !== '' && strlen($estado) > 2)      $erros[] = "Estado deve ser a sigla (ex: SP).";
if ($cep !== '' && strlen($cep) > 8)            $erros[] = "CEP inválido (máx. 8 números).";
if ($pais !== '' && strlen($pais) > 2)          $erros[] = "País deve ser o código de 2 letras (ex: BR).";

if (!empty($erros)) {
    echo "<h3>Não foi possível cadastrar a empresa:</h3><ul>";
    foreach ($erros as $erro) {
        echo "<li>" . htmlspecialchars($erro) . "</li>";
    }
    echo "</ul><a href='javascript:history.back()'>Voltar</a>";
    exit;
}

// data_abertura em branco -> grava NULL em vez de string vazia (a coluna é DATE)
$data_abertura = $data_abertura === '' ? null : $data_abertura;

$sql = "INSERT INTO empresa
    (razao_social, nome_fantasia, CNPJ, data_abertura, telefone, email, Rua, numero, bairro, cidade, estado, cep, pais)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conexao, $sql);

if (!$stmt) {
    die("Erro ao preparar a consulta: " . mysqli_error($conexao));
}

mysqli_stmt_bind_param(
    $stmt,
    "sssssssssssss",
    $razao_social,
    $nome_fantasia,
    $cnpj,
    $data_abertura,
    $telefone,
    $email,
    $rua,
    $numero,
    $bairro,
    $cidade,
    $estado,
    $cep,
    $pais
);

if (!mysqli_stmt_execute($stmt)) {
    die("Erro ao cadastrar empresa: " . mysqli_stmt_error($stmt));
}

mysqli_stmt_close($stmt);
mysqli_close($conexao);

header("location: consulta.php");
exit;
