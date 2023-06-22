<?php
require('../../database/conexao.php');
$sql = "SELECT DISTINCT * FROM produtos ORDER BY RAND() LIMIT 5";
$result = mysqli_query($ponte, $sql);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
   <link rel="icon" href="../../assets/logo.png">
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Carrinho Vazio</title>
   <link href="https://fonts.googleapis.com/css?family=Kumar+One&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="vazio.css">
</head>
<body>
   <ul class="head">
       <li class="seti">
           <a href="../../principal_pages/cadastrado/cadastrado.php">
               <img src="../../assets/seta_voltar.png" alt="seta para voltar">
           </a>
       </li>
       <li class="car">
           <span id="carr">Carrinho</span>
           <img src="../../assets/carrinho.png" alt="foto de um carrinho">
       </li>
       <li class="life">
           <a href="../../principal_pages/cadastrado/cadastrado.php">
               <span>4life</span>
           </a>
       </li>
   </ul>
   <div class="img-caixa">
       <img src="../../assets/caixa.png" alt="foto de uma caixa">
       <span>Seu carrinho está vazio</span>
   </div>
   <div class="txt">
       <span>Sugestões</span>
   </div>
   <?php
   // Exibe os produtos da categoria "Blusas"
   while ($row = mysqli_fetch_assoc($result)) {
       $produto_id = $row['id'];
       $nome = $row['nome_prod'];
       $preco = $row['preco_prod'];
       $fotoprod = $row['foto_prod'];
       ?>
       <div class="all12">
           <div>
               <div class="img">
                   <img src="<?php echo $fotoprod; ?>" alt="imagem do produto">
               </div>
               <div class="in">
                   <span>Nome: <?php echo $nome; ?></span>
                   <span>Preço: R$ <?php echo $preco; ?></span>
               </div>
           </div>
       </div>
       <?php } ?>
</body>
</html>