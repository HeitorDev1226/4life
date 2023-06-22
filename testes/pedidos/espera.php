<?php
// Inicie a sessão (caso ainda não tenha sido iniciada)
session_start();

// Verifica se o usuário está autenticado, caso contrário, redireciona para a página de login
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Espera</title>
</head>
<body>
    <h1>Seu pedido está em análise</h1>
    <p>Aguarde enquanto o administrador avalia sua solicitação.</p>
</body>
</html>
