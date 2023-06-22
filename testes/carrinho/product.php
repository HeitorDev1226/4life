<?php
require('../database/conexao.php');

session_start();

// Verificar se o ID do produto está presente na URL
if (isset($_GET['id'])) {
    $id_produto = $_GET['id'];

    // Simular consulta ao banco de dados para obter os dados do produto com base no ID
    // Substitua este trecho de código pela consulta real ao seu banco de dados
    $produto = array(
        'id' => $id_produto,
        'nome' => 'Produto ' . $id_produto,
        'foto' => 'caminho/para/foto.jpg',
        'preco' => 10.99
    );

    // Exibir as informações do produto
    echo '<h1>' . $produto['nome'] . '</h1>';
    echo '<img src="' . $produto['foto'] . '" alt="Imagem do Produto">';
    echo '<p>Preço: R$ ' . $produto['preco'] . '</p>';

    // Botão "Adicionar ao Carrinho"
    echo '<form action="carrinho.php" method="post">';
    echo '<input type="hidden" name="id" value="' . $produto['id'] . '">';
    echo '<input type="hidden" name="nome" value="' . $produto['nome'] . '">';
    echo '<input type="hidden" name="preco" value="' . $produto['preco'] . '">';
    echo '<input type="submit" name="adicionar_carrinho" value="Adicionar ao Carrinho">';
    echo '</form>';
} else {
    echo 'Produto não encontrado.';
}

// Verificar se o carrinho está vazio e redirecionar para a página do carrinho
if (!empty($_SESSION['carrinho']) && isset($_POST['adicionar_carrinho'])) {
    header('Location: carrinho.php');
    exit();
}
?>