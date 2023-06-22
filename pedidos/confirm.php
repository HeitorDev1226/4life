<?php
    require('../database/conexao.php');
    session_start();

    $id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pagina de confirmaçao</title>
    <link rel="stylesheet" href="confirm.css">
    <link rel="stylesheet" href="https://kit.fontawesome.com/6859528c9f.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Kumar+One&display=swap" rel="stylesheet">
</head>
<body>
    <div class="all">
        <header class="menu">
            <div class="logo">
                <a href="../principal_pages/cadastrado/cadastrado.php">
                    <P>4life</P>
                </a>
            </div>
            <div class="confirmar">
                <p>confirmação</p>
            </div>
        </header>
        <main>
            <div class="corpo">
                <div class="corpo_frase">
                    <div class="frase">
                        <p>seu pedido foi enviado com sucesso</p>
                    </div>
                    <div class="corpo_vertical">
                        <div class="vertical"></div>
                        <div class="triangulo"></div>
                    </div>
                </div>
                <div class="imagem_caminhao">
                    <img src="../assets/caminhao.png" alt="">
                </div>
            </div>
        </main>
        <footer>
            <div class="all1"> 
                <div class="detal">
                    <a href="requestsDetails.php?id=<?php echo $id; ?>">
                        <button name="id">ver detalhes do pedido</button>
                    </a>
                </div>
                <div class="volt">
                    <a href="../principal_pages/cadastrado/cadastrado.php">
                        <button>
                            voltar a pagina principal
                        </button>
                    </a>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>