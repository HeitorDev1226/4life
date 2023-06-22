<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "4life-bd";

$ponte = new mysqli("$host", "$user", "$pass","$db");
// Testa a conexão
if ($ponte->connect_error) {
    die("Falha na conexão: " . $ponte->connect_error);
} else {
    echo "ok!";
}
?>