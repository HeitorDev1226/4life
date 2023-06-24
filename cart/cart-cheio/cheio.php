<?php
require('../../database/conexao.php');
session_start();

if (isset($_POST['adicionar_carrinho'])) {
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

    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }
    $_SESSION['carrinho'][] = $item;

    header('Location: cheio.php');
    exit();
}

if (isset($_POST['limpar_carrinho'])) {
    $_SESSION['carrinho'] = [];

    header('Location: ../cart-vazio/vazio.php');
    exit();
}

if (!empty($_SESSION['carrinho'])) {
    $idsProdutos = array_column($_SESSION['carrinho'], 'id');
    $idsProdutosString = implode(',', $idsProdutos);

    // Salve a string de IDs dos produtos onde desejar (por exemplo, em uma variável de sessão)
    $_SESSION['ids_produtos'] = $idsProdutosString;
}

$sql_user = "SELECT id FROM usuarios ORDER BY id DESC LIMIT 1";
$sql_query = mysqli_query($ponte, $sql_user);
$id_user = null;

if ($sql_query && mysqli_num_rows($sql_query) > 0) {
    $dados_query = mysqli_fetch_assoc($sql_query);
    $id_user = $dados_query['id'];
}

if (!empty($_SESSION['ids_produtos'])) {
    $idsProdutosString = $_SESSION['ids_produtos'];
    $idsProdutosArray = explode(',', $idsProdutosString);

    echo 'IDs dos produtos: ';
    foreach ($idsProdutosArray as $idProduto) {
        echo $idProduto . ' ';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../../assets/logo.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cheio.css">
    <link href="https://fonts.googleapis.com/css?family=Kumar+One&display=swap" rel="stylesheet">
    <title>Carrinho</title>
</head>

<body>
    <ul>
        <li class="set-voltar">
            <a href="../../principal_pages/cadastrado/cadastrado.php">
                <img src="../../assets/seta_voltar.png" alt="seta de voltar">
            </a>
        </li>
        <li class="carrinho">
            <span>Carrinho de compras</span>
            <img src="../../assets/carrinho.png" alt="carrinho">
        </li>
        <li class="logo">
            <a href="../../principal_pages/cadastrado/cadastrado.php">
                <span>4life</span>
            </a>
        </li>
    </ul>
    <div class="all">
        <?php
        if (empty($_SESSION['carrinho'])) {
            echo '<p>O carrinho está vazio.</p>';
        } else {
            $idsProdutos = [];
            foreach ($_SESSION['carrinho'] as $index => $produto) {
                echo '<div>';
                echo '<div class="img">';
                echo '<img src="' . $produto['foto'] . '" alt="imagem de uma roupa">';
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

            echo '<form action="cheio.php" method="post">';
            echo '<input type="submit" name="limpar_carrinho" value="Limpar Carrinho">';
            echo '</form>';
        }
        ?>
    </div>
    <?php if (!empty($_SESSION['carrinho'])) : ?>
        <div class="cont">
            <form class="confirm" action="requestChest.php" method="GET">
                <span>CLIQUE AQUI PARA CONFIRMAR ITENS</span>
                <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
                <input type="hidden" name="id_prod" value="<?php echo $idsProdutosString; ?>">
                <input type="submit" value="CONFIRMAR">
            </form>
            <?php
            unset($_SESSION['carrinho']);
            ?>
        </div>
    <?php else : ?>
    <?php endif; ?>

</body>

</html>
