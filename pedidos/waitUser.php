<?php
    require('../database/conexao.php');
    $id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="waitUser.css">
    <title>Waiting</title>
</head>
<body>
    <div class="all">
        <div class="gif">
            <img src="../assets/loading.gif">
        </div>
        <div class="informe">
            <h1>PROCESSANDO PAGAMENTO, AGUARDE...</h1>
        </div>
    </div>
    <script>
        setTimeout(function() {
            window.location.href = "confirm.php?id=<?php echo $id; ?>";
        }, 5000); // 5 segundos em milissegundos
    </script>
</body>
</html>