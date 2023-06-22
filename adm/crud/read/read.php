<?php
require('../../../database/conexao.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consultando produto</title>
    <link rel="stylesheet" href="read.css">
    <link rel="icon" href="../../../assets/logo.png">
</head>

<body>
    <div class="cont">
        <div class="container">
            <div class="voltar">
                <a href="../menu/menu.php">
                    <img src="../../../assets/seta_voltar.png">
                </a>
            </div>
            <span>CONSULTAR PRODUTO</span>
            <form method="POST" action="ler.php" class="opcoes">
                <label>ID DO PRODUTO</label>
                <input type="number" id="id" name="id_prod">
        </div>
        <div class="but">
            <input type="submit" value="CONSULTAR">
        </div>
        </form>
    </div>
</body>

</html>



<?php
// $id="1";
// $sql = "SELECT foto_prod FROM produtos WHERE id = $id";
//$resultado = mysqli_query($ponte, $sql);
//if ($resultado) {
//    // Recuperar o caminho ou URL da imagem do resultado da consulta
//    $linha = mysqli_fetch_assoc($resultado);
//    $imagem = $linha['foto_prod'];

// Incluir o caminho ou URL da imagem em um elemento HTML img
//    echo "<img src='$imagem' alt='Imagem do produto'>";
//  } else {
// Exibir mensagem de erro se a consulta falhar
//      echo "Erro na consulta SQL: " . mysqli_error($conexao);
//  }
?>