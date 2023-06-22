<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ler.css">
    <title>ler</title>
</head>
<body>
    
</body>
</html>

<?php
     
    require('../../../database/conexao.php');

    $id = $_POST['id_adm'];

    $sql  = "SELECT * FROM administradores WHERE id = $id";
    $query = mysqli_query($ponte,$sql);
   
    if (mysqli_num_rows($query) > 0) {
        // Exibe os dados
        while ($row = mysqli_fetch_assoc($query)) {
        echo "<br>";
        echo "ID: " . $row["id"] . "<br>";
        echo "NOME: " . $row["nome"] . "<br>";
        echo "SENHA: " . $row["senha"] . "<br>";
        echo "DATA DE NASCIMENTO: " . $row["data_nasc"] . "<br>";
        echo "CPF: " . $row["cpf"] . "<br>";
        echo "RG: " . $row["rg"] . "<br>";
        }
    } else {
        echo "Nenhum resultado encontrado.";
    }

    
    