<?php
require('../database/conexao.php');
session_start();

$id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE id = $id";
$query = mysqli_query($ponte, $sql);

if ($query) {
    $dados = mysqli_fetch_assoc($query);
    $nome = $dados['nome'];
}

$sql_itens = "SELECT pd.fk_produtos_id, p.nome_prod AS nome_produto, p.preco_prod AS preco
              FROM pedidos AS pd
              JOIN produtos AS p ON pd.fk_produtos_id = p.id
              WHERE pd.fk_usuarios_id = $id";
$query_itens = mysqli_query($ponte, $sql_itens);

$total_preco = 0;

if ($query_itens && mysqli_num_rows($query_itens) > 0) {
    echo '<div class="itens">Itens: <br>';
    while ($dados = mysqli_fetch_assoc($query_itens)) {
        echo $dados['nome_produto'] . ' - R$ ' . $dados['preco'] . '<br>';
        $total_preco += $dados['preco'];
    }
    echo '</div>';
} else {
    echo "Nenhum item encontrado.";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="requestDetails.css">
    <title>Document</title>
</head>

<body>
    <div class="all">
        <div class="container">
            <div class="img">
                <a href="confirm.php?id=<?php echo $id ?>">
                    <img src="https://cdn-icons-png.flaticon.com/512/60/60577.png" alt="">
                </a>
            </div>
            <div class="cont">
                <div class="detalhes">
                    <p>DETALHES DO PEDIDO</p>
                </div>
                <div class="nome">Nome: <?php echo $nome; ?></div>

                <?php
                if ($query_itens && mysqli_num_rows($query_itens) > 0) {
                    echo '<div class="itens">Itens: <br>';
                    while ($dados = mysqli_fetch_assoc($query_itens)) {
                        echo $dados['nome_produto'] . ' - R$ ' . $dados['preco_prod'] . '<br>';
                        $itens = $dados['nome_produto'] . ' - R$ ' . $dados['preco_prod'] . '<br>';

                        $total_preco += $dados['preco_prod'];
                    }
                    echo '</div>';
                } else {
                    echo "Nenhum item encontrado.";
                }
                ?>
                <div class="preco">Preço total: R$ <?php echo $total_preco; ?></div>
                <div class="vendedor">Vendedor: 4LIFE</div>
            </div>
        </div>
    </div>
</body>

</html>
