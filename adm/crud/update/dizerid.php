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
    <link rel="stylesheet" href="dizerid.css">
    <link rel="icon" href="../../../assets/logo.png">
</head>

<body>
    <div class="cont">
        <div class="container">
            <div class="voltar">
                <a href="../../../principal_pages/adm/adm.php">
                    <img src="../../../assets/seta_voltar.png">
                </a>
            </div>
            <span>INFORME O ID DO PRODUTO A SER ALTERADO</span>
            <form method="POST" action="update.php" class="opcoes">
                <label>ID DO PRODUTO</label>
                <input type="number" id="id" name="id_prod">
                <div class="but">
                    <input type="submit" value="CONSULTAR E ALTERAR">
                </div>
        </div>
            </form>
    </div>
</body>
</html>
