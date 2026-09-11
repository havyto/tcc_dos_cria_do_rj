<?php

setcookie("lembrar_usuario", "", time() - 3600, "/");

session_start();
session_destroy();

header("Location: ../index.php");
exit;

?>