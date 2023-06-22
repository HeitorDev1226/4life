<?php
    require('../database/conexao.php');
    session_start();
    $id = $_GET['id_user'];

    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $query = mysqli_query($ponte, $sql);

    if($query){
        $dados = mysqli_fetch_assoc($query);
        $card = $dados['cart_credit'];
    }else{
        echo $ponte->error;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="waitPay.css">
 <title>Document</title>
</head>
<body>
 <div class="all">
   <div class="ag">
     <h1>AGUARDANDO PAGAMENTO</h1>
   </div>
   <div class="container">
     <div class="inc">
       INSIRA AQUI O NÚMERO DO CARTÃO
       </div>
     <div class="input">
       <input type="text" value= "<?php echo $card; ?>">
     </div>
     <div class="btn">
       <a href="waitUser.php?id=<?php echo $id; ?>">
         <button>
           ENVIAR
         </button>
       </a>
     </div>
   </div>
   <div class="op">
     <h1>O PEDIDO SERA ENVIADO APOS VALIDAÇÃO DO CARTÃO . . .</h1>
   </div>
 </div>
</body>
</html>

