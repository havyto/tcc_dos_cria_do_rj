<?php
/**
 * Conexão única com o banco ghost_gamer (mysqli).
 * Todos os outros arquivos .php incluem este arquivo com:
 *     require_once "conexao.php";
 */

$conexao = mysqli_connect("localhost", "root", "", "ghost_gamer");

if (!$conexao) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

// Garante acentuação correta (ã, ç, é...)
mysqli_set_charset($conexao, "utf8");
