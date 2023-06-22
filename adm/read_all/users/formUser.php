<?php
    require('../../../database/conexao.php');

    $id = $_GET['id'];
    
    $sql_exibir = "SELECT * FROM usuarios WHERE id = $id";
    $query_exibir = mysqli_query($ponte, $sql_exibir);

    if($query_exibir){
        $dados_user = mysqli_fetch_assoc($query_exibir);
        $id = $dados_user['id'];
        $nome = $dados_user['nome'];
        $sobrenome = $dados_user['sobrenome'];
        $email = $dados_user['email'];
        $senha = $dados_user['senha'];
        $data_nasc = $dados_user['data_nasc'];
        $rua = $dados_user['rua'];
        $bairro = $dados_user['bairro'];
        $num_casa = $dados_user['num_casa'];
        $cep = $dados_user['cep'];
        $cart_credit = $dados_user['cart_credit'];
        $cidade = $dados_user['cidade'];
    }else{
        echo $ponte -> error;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="alterar_user.css">
</head>
<body>
    <div class="cont">
        <div class="container">
            <div class="criar">
                <a href="usuarios.php">
                    <img src="../../../assets/seta_voltar.png">
                </a>         
                <span>EDITAR A CONTA DO(a) USUÁRIO(a) <?php echo $nome . " " . $sobrenome; ?>!</span>
            </div>
            
        <div class="all">
            <form class="form" action = "alterUser.php" method="get">
                <div class="dados">
                    <span>DADOS PESSOAIS</span>
                    <label>iD:</label>
                    <input type="text" readonly="true" name = "id" placeholder="Nome:" value="<?php echo $id; ?>">
                    <label>Nome:</label>
                    <input type="text" name = "nome" placeholder="Nome:" value="<?php echo $nome; ?>">
                    <label>Sobrenome:</label>
                    <input type="text" name = "sobrenome" placeholder="Nome:" value="<?php echo $sobrenome; ?>">
                    <label>E-mail:</label>
                    <input type="email" name="email" placeholder="E-mail:" value="<?php echo $email; ?>">
                    <label>Senha:</label>
                    <input type="password" name = "senha" placeholder="Senha:" value="<?php echo $senha; ?>">
                    <label>Cartão de crédito:</label>
                    <input type="number" name = "cart_credit" placeholder="0000 0000 0000 0000" value="<?php echo $cart_credit; ?>">
                    <label>Data de nascimento:</label>
                    <input type="date" name = "data_nasc" placeholder="00/00/0000:" value="<?php echo $data_nasc; ?>">
                </div>
                <div class="endereco">
                    <span>ENDEREÇO</span>
                    <label>Rua:</label>
                    <input type="text" name = "rua" placeholder="Rua:" value="<?php echo $rua; ?>">
                    <label>Cidade:</label>
                    <input type="text" name = "cidade" placeholder="Cidade:" value="<?php echo $cidade; ?>">
                    <label>Numero da casa:</label>
                    <input type="number" name = "num_casa" placeholder="Numero da casa:" value="<?php echo $num_casa; ?>">
                    <label>Bairro:</label>
                    <input type="text" name = "bairro" placeholder="Bairro:" value="<?php echo $bairro; ?>">
                    <label>Cep:</label>
                    <input type="number" name = "cep" placeholder="Cep:" value="<?php echo $cep; ?>">
                    <input type="submit" value="EDITAR">
                </div>
            </form>
            <div class="btn">
            </div>
        </div>
        </div>
    </div>
</body>
</html>