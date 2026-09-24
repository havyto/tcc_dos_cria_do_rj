<?php
/**
 * Conexão central com o banco de dados (PDO).
 *
 * Substitui as antigas chamadas mysql_connect()/mysql_query(), que não
 * existem mais a partir do PHP 7. Todo o sistema (login, cadastro,
 * perfil e suporte) usa este arquivo para falar com o MySQL de forma
 * segura (prepared statements => sem SQL Injection).
 *
 * Ajuste as constantes abaixo conforme o seu ambiente (XAMPP local,
 * servidor de produção, etc).
 */

const DB_HOST = "localhost";
const DB_NOME = "ghost_gamer";
const DB_USUARIO = "root";
const DB_SENHA = "";
const DB_CHARSET = "utf8mb4";

function conectarBanco(): PDO
{
    static $pdo = null;

    if ($pdo instanceof PDO) {
        return $pdo;
    }

    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NOME . ";charset=" . DB_CHARSET;

    try {
        $pdo = new PDO($dsn, DB_USUARIO, DB_SENHA, [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]);
    } catch (PDOException $e) {
        http_response_code(500);
        die("Não foi possível conectar ao banco de dados. Verifique se o MySQL está rodando e se o banco 'ghost_gamer' existe.");
    }

    return $pdo;
}
