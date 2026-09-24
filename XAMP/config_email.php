<?php
/**
 * Configuração de e-mail do Ghost Gamer.
 *
 * Preencha estes dados com uma conta de e-mail profissional da empresa
 * (ex: Gmail com "senha de app", Outlook/Office365, ou o SMTP da sua
 * hospedagem). É esse e-mail que ENVIA as mensagens do Suporte, e é
 * para EMAIL_SUPORTE_DESTINO que elas chegam.
 *
 * Gmail: ative a verificação em 2 etapas e gere uma "senha de app" em
 * https://myaccount.google.com/apppasswords — não use a senha normal.
 */

return [
    // Servidor SMTP usado para enviar os e-mails
    "smtp_host"       => "smtp.gmail.com",
    "smtp_porta"      => 587,
    "smtp_seguranca"  => "tls",           // "tls" ou "ssl"
    "smtp_usuario"    => "seuemail@gmail.com",
    "smtp_senha"      => "sua-senha-de-app-aqui",

    // Remetente que aparece nos e-mails enviados pelo sistema
    "remetente_email" => "seuemail@gmail.com",
    "remetente_nome"  => "Ghost Gamer",

    // Para onde as mensagens do formulário de Suporte são enviadas
    "suporte_destino" => "suporte@ghostgamer.com",
];
