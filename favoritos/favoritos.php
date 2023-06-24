<?php
require_once('../database/conexao.php');
session_start();

if (isset($_POST['adicionar_favorito'])) {
    $id_produto = $_POST['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $foto = $_POST['foto'];

    $item = [
        'id' => $id_produto,
        'nome' => $nome,
        'preco' => $preco,
        'foto' => $foto
    ];

    if (!isset($_SESSION['favoritos'])) {
        $_SESSION['favoritos'] = [];
    }
    $_SESSION['favoritos'][] = $item;

    header('Location: ../favoritos/favoritos.php');
    exit();
}

if (isset($_POST['limpar_favoritos'])) {
    $_SESSION['favoritos'] = [];

    header('Location: ../favoritos/favoritos.php');
    exit();
}

$sql_user = "SELECT id FROM usuarios ORDER BY id DESC LIMIT 1";
$sql_query = mysqli_query($ponte, $sql_user);
$id_user = null;

if ($sql_query && mysqli_num_rows($sql_query) > 0) {
    $dados_query = mysqli_fetch_assoc($sql_query);
    $id_user = $dados_query['id'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="../../assets/logo.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="favoritos.css">
    <link href="https://fonts.googleapis.com/css?family=Kumar+One&display=swap" rel="stylesheet">
    <title>favoritos</title>
</head>
<body>
    <ul>
        <li class="set-voltar">
            <a href="../principal_pages/cadastrado/cadastrado.php">
                <img src="../assets/seta_voltar.png" alt="seta de voltar">
            </a>
        </li>
        <li class="favoritos">
            <span>FAVORITOS</span>
            <img src="../assets/coracao.png" alt="favoritos">
        </li>
        <li class="logo">
            <a href="../principal_pages/cadastrado/cadastrado.php">
                <span>4life</span>
            </a>
        </li>
    </ul>
    <div class="all">
        <?php
        if (empty($_SESSION['favoritos'])) {
            echo '<p>O favoritos está vazio.</p>';
        } else {
            $idsProdutos = [];
            foreach ($_SESSION['favoritos'] as $index => $produto) {
                echo '<div>';
                echo '<div class="img">';
                echo '<img src="' . $produto['foto'] . '" alt="imagem de uma roupa" style="width: 200vh; height: 38vh;">';
                echo '</div>';
                echo '<div class="in">';
                echo '<span>Nome: ' . $produto['nome'] . '</span>';
                echo '<span>Preço: R$ ' . $produto['preco'] . '</span>';
                echo '</div>';
                echo '</div>';
                echo '<hr>';

                $idProduto = $produto['id'];
                $idsProdutos[] = $idProduto;
            }

            echo '<form action="favoritos.php" method="post">';
            echo '<input type="submit" name="limpar_favoritos" value="Limpar favoritos">';
            echo '</form>';

            if (!empty($idsProdutos)) {
                foreach ($idsProdutos as $idProduto) {
                    $quantidade = array_count_values(array_column($_SESSION['favoritos'], 'id'))[$idProduto];
                    for ($i = 0; $i < $quantidade; $i++) {
                        echo '<input type="hidden" name="ids_produtos[]" value="' . $idProduto . '">';
                    }
                }
            }
        }
        if (isset($_POST['adicionar_favorito'])) {
            $id_produto = $_POST['id'];
            $nome = $_POST['nome'];
            $preco = $_POST['preco'];
            $foto = $_POST['foto'];
        
            $item = [
                'id' => $id_produto,
                'nome' => $nome,
                'preco' => $preco,
                'foto' => $foto
            ];
        
            if (!isset($_SESSION['favoritos'])) {
                $_SESSION['favoritos'] = [];
            }
        
            // Verificar se o produto já está na lista de favoritos
            $produto_existente = false;
            foreach ($_SESSION['favoritos'] as $favorito) {
                if ($favorito['id'] == $id_produto) {
                    $produto_existente = true;
                    break;
                }
            }
        
            // Adicionar o produto apenas se não estiver na lista de favoritos
            if (!$produto_existente) {
                $_SESSION['favoritos'][] = $item;
            }
        
            header('Location: ../favoritos/favoritos.php');
            exit();
        }
        
        ?>
    </div>
    <div class="all">
        <form action="../cart/cart-cheio/cheio.php" method="post">
            <?php
            // Loop através dos produtos favoritos
            foreach ($_SESSION['favoritos'] as $index => $produto) {
                // Exibir os detalhes do produto
                echo '<div>';
                echo '<div class="img">';
                echo '<img src="' . $produto['foto'] . '" alt="imagem de uma roupa" style="width: 200vh; height: 38vh;">';
                echo '</div>';
                echo '<div class="in">';
                echo '<span>Nome: ' . $produto['nome'] . '</span>';
                echo '<span>Preço: R$ ' . $produto['preco'] . '</span>';
                echo '</div>';
                echo '</div>';
                echo '<hr>';

                // Adicionar campo oculto com o ID do produto
                echo '<input type="hidden" name="ids_produtos[]" value="' . $produto['id'] . '">';
            }
            ?>

            <!-- Botão para adicionar todos os produtos ao carrinho -->
            <input type="submit" name="ad_carrinho" value="Adicionar ao Carrinho">
        </form>
    </div>

    <!-- Rodapé e outros elementos HTML -->
</body>
</html>
