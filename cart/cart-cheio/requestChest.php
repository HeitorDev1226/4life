<?php
require('../../database/conexao.php');

if (!empty($_GET['id_prod'])) {
    // Separa os IDs dos produtos em um array
    $idsProdutos = explode(',', $_GET['id_prod']);
    $id_user = $_GET['id_user'];

    // Insere os IDs na tabela "pedidos"
    foreach ($idsProdutos as $idProduto) {
        $sql = "INSERT INTO pedidos (fk_usuarios_id, fk_produtos_id) VALUES ('$id_user', '$idProduto')";
        $resultado = mysqli_query($ponte, $sql);

        if (!$resultado) {
            echo "Erro ao inserir o ID do produto: " . mysqli_error($ponte);
            // Tratar o erro adequadamente de acordo com o seu caso
        }
    }

    // Se a inserção foi bem-sucedida, você pode exibir uma mensagem ou redirecionar para outra página
    echo "Os IDs dos produtos foram inseridos na tabela pedidos com sucesso!";
    // Ou redirecionar para uma página específica
    $url = "../../pedidos/waitPay.php?id_user=" . $id_user;
    header("Location: " . $url);
    exit();
}
?>