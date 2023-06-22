<?php
require('../../database/conexao.php');
session_start();

// Verificar se o usuário está autenticado
if (!isset($_SESSION['email'])) {
    // Usuário não autenticado, redirecionar para a página de login
    header('Location: ../../cadastro/login.php');
    exit();
}

// Exibir os dados do usuário logado
$email = $_SESSION['email'];
$senha = $_SESSION['senha'];
$idusuario = $_SESSION['idusuario'];

// Aqui você pode usar os dados do usuário como desejar

// Por exemplo, exibir o email e o ID do usuário:
$id = $idusuario;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>
    pagina principal
   </title>
   <link rel="icon" href="../../assets/logo.png">
   <link rel="stylesheet" href="cadastrado.css">
   <link rel="stylesheet" href="https://kit.fontawesome.com/6859528c9f.css" crossorigin="anonymous">
   <link href="https://fonts.googleapis.com/css?family=Kumar+One&display=swap" rel="stylesheet">
</head>
<body onload="carregar()">
    <header>
       

        <ul class="head">
            <li>
                <span>4life</span>
            </li>
            <li>
                <div class="input">
                    <input type="text" name="pesquisar">
                    <button type="submit">
                        <img src="../../assets/lupa_branca.png">     
                    </button>
                </div>
            </li>
            <li class="heart">
                <a href="../../favoritos/favoritos.php">
                    <img src="../../assets/coracao.png">
                </a>
            </li>
            <li class="carrinho">
                <a href="../../cart/cart-cheio/cheio.php?id=<?php echo $id?>">
                    <img src="../../assets/carrinho.png">
                </a>
            </li>
            <li class="perfil">
                <a href="../../perfil/perfil.php?id=<?php echo $id; ?>">
                    <img src="../../assets/profile.png">
                </a>
            </li>
        </ul>
    </header>
    <div class="carr">
        <div class="cont">
            <div class="imagem">
                <img id="imagem" src="../../assets/carrosel1.webp" alt="imagem">
            </div>
            <div class="pontos">
                <ul>
                    <li id="ponto1"></li>
                    <li id="ponto2"></li>
                    <li id="ponto3"></li>
                </ul>
            </div>
        </div>
    </div>       
    <div class="categorias">
        <div class="categ">
            <a href="../../categorias/blusas.php" class="catego">
                <img src="../../assets/blusas.jpg">
            </a>
            <p>Blusas</p>
        </div>
        <div class="categ">
            <a href="../../categorias/calcas.php" class="catego">
                <img src="../../assets/calças.jpg">
            </a>
            <p>Calça</p>
        </div>
        <div class="categ">
            <a href="../../categorias/conjuntos.php" class="catego">
                <img src="../../assets/conjunto.png">
            </a>
            <p>Conjunto</p>
        </div>
        <div class="categ">
            <a href="../../categorias/roupfeminina.php" class="catego">
                <img src="../../assets/roupa-feminina.png">
            </a>
            <p>Roupa-feminina</p>
        </div>
        <div class="categ">
            <a href="../../categorias/jaqueta.php" class="catego">
                <img src="../../assets/jaquetas.jpg">
            </a>
            <p>Jaqueta</p>
        </div>
    </div>
    <div class="fotos">
        <div class="ft">
            <img src="" alt="foto de roupas" id="img">
        </div>
        <div class="ft">
            <img src="" alt="foto de roupas" id="img">
        </div>
        <div class="ft">
            <img src="" alt="foto de roupas" id="img">
        </div>
        <div class="ft">
            <img src="" alt="foto de roupas" id="img">
        </div>
        <div class="ft">
            <img src="" alt="foto de roupas" id="img">
        </div>
        <div class="ft">
            <img src="" alt="foto de roupas" id="img">
        </div>
       
    </div>
    <footer>
        <div class="rodape">
            <div>
                <img id="fourlife_logo" src="../../assets/logo.png">
            </div>
            <div class="redes_sociais">
                <p>nossas redes sociais</p>
                <a href="https://www.instagram.com/4life.an/">
                    <img src="../../assets/insta.png" alt="icone instagram">
                </a>
            </div>
        </div>
    </footer>
    <script src="cadastrado.js"></script>
</body>
</html>