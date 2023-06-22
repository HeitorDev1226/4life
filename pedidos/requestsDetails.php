<?php
    require('../database/conexao.php');
    session_start();

    $id = $_GET['id'];

    // Verificar se o carrinho existe na sessão
    if (isset($_SESSION['carrinho'])) {
        $idsProdutos = array(); // Array para armazenar os IDs dos produtos no carrinho

        // Obter os IDs dos produtos no carrinho
        foreach ($_SESSION['carrinho'] as $produto) {
            $idsProdutos[] = $produto['id'];
        }

        // Converter o array em uma string de IDs separados por vírgula
        $idsProdutosString = implode(',', $idsProdutos);

        $sql = "SELECT p.fk_produtos_id, u.nome FROM pedidos p JOIN usuarios u ON p.fk_usuarios_id = u.id WHERE p.id = $id AND p.fk_produtos_id IN ($idsProdutosString)";
        $query = mysqli_query($ponte, $sql);

        if ($query) {
            $dados = mysqli_fetch_assoc($query);
            
            $fkProdutosId = $dados['fk_produtos_id'];
            $nomeUsuario = $dados['nome'];
           
        }
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
       <a href="confirm.php">
         <img src="https://cdn-icons-png.flaticon.com/512/60/60577.png" alt="">
       </a>
     </div>
     <div class="cont">
       <div class="detalhes">
         <p>DETALHES DO PEDIDO</p>
       </div>
       <div class="nome">Nome: <?php echo " " . $nomeUsuario; ?></div>
       <div class="itens">Itens:</div>
       <div class="preco">Preço:</div>
       <div class="comprador">Comprador:</div>
       <div class="vendedor">Vendedor:</div>
     </div>
   </div>
 </div>
</body>
</html>

