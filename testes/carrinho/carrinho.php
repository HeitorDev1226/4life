<?php
    require('../database/conexao.php');

    session_start();

    // Verificar se o carrinho já existe na sessão
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = array(); // Inicializar o carrinho como um array vazio
    }

    // Verificar se o formulário foi enviado e o botão "Adicionar ao Carrinho" foi pressionado
    if (isset($_POST['adicionar_carrinho'])) {
        // Obter os dados do produto enviado pelo formulário
        $id_produto = $_POST['id'];
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        
        // Criar um novo item com os dados do produto
        $item = array(
            'id' => $id_produto,
            'nome' => $nome,
            'preco' => $preco
        );
        
        // Adicionar o item ao carrinho
        $_SESSION['carrinho'][] = $item;
        
        // Redirecionar para a página do carrinho
        header('Location: carrinho.php');
        exit();
    }

    // Verificar se o botão "Limpar Carrinho" foi pressionado
    if (isset($_POST['limpar_carrinho'])) {
        // Limpar todos os itens do carrinho
        $_SESSION['carrinho'] = array();
        
        // Redirecionar de volta para a página do carrinho
        header('Location: carrinho.php');
        exit();
    }

    // Exibir os produtos no carrinho
    echo '<h1>Carrinho de Compras</h1>';
    if (empty($_SESSION['carrinho'])) {
        echo 'O carrinho está vazio.';
    } else {
        foreach ($_SESSION['carrinho'] as $produto) {
            echo '<p>Nome: '.$produto['nome'].'</p>';
            echo '<p>Preço: R$ '.$produto['preco'].'</p>';
            echo '<hr>';
        }
        
        // Botão "Limpar Carrinho"
        echo '<form action="carrinho.php" method="post">';
        echo '<input type="submit" name="limpar_carrinho" value="Limpar Carrinho">';
        echo '</form>';
    }
?>
