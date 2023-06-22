<?php
   require ('../database/conexao.php');
    include 'processa.php';
    require('../database/conexao.php');
    
    // Consulta para obter os produtos da categoria "Blusas"
    $sql = "SELECT DISTINCT * FROM produtos WHERE fk_categorias_id = 7";
    $result = mysqli_query($ponte, $sql);
    ?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
       <meta charset="UTF-8">
       <link rel="icon" href="../assets/logo.png">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Blusas</title>
       <link rel="stylesheet" href="categ.css">
       <link rel="stylesheet" href="https://kit.fontawesome.com/6859528c9f.css" crossorigin="anonymous">
       <link href="https://fonts.googleapis.com/css?family=Kumar+One&display=swap" rel="stylesheet">
    </head>
    <body>
       <header>
           <ul>
               <li class="set-voltar">
                   <a href="../principal_pages/cadastrado/cadastrado.php">
                   <img src="../assets/seta_voltar.png">
                   </a>
               </li>
               <li class="logo">
                   <a href="../principal_pages/cadastrado/cadastrado.php">
                       <p>4life</p>
                   </a>
               </li>
               <li class="categ">
                   <p>Blusas</p>
               </li>
           </ul>
       </header>
       <main>
           <div class="all">
               <?php
               // Exibe os produtos da categoria "Blusas"
               while ($row = mysqli_fetch_assoc($result)) {
                   $produto_id = $row['id'];
                   $nome = $row['nome_prod'];
                   $preco = $row['preco_prod'];
                   $fotoProd = $row['foto_prod'];
                   ?>
                   <form action="../produtos/produto.php" method="GET">
                       <button class="btn1" type="submit">
                           <div class="img-produtos">
                            <div class="all">
                                <div class="all2">
                                    <div class="produto">
                                        <img src="<?php echo $fotoProd; ?>" alt="Foto do produto">
                                    </div>
                                    <div class="name">
                                        <p><?php echo $nome; ?></p>
                                    </div>
                                    <div class="inf">
                                        <p>50% OFF</p>
                                        <p><?php echo $preco; ?></p>
                                    </div>
                                </div>
                            </div>
                           </div>
                           <input type="hidden" name="id" value="<?php echo $produto_id; ?>">
                       </button>
                   </form>
               <?php } ?>
           </div>
       </main>
    </body>
    </html>
    