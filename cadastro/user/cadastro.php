<?php
    
    require('../../database/conexao.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cadastro.css">
</head>
<body>
    <div class="cont">
        <div class="container">
            <div class="criar">
                <a href="../login.php">
                    <img src="../../assets/seta_voltar.png">
                </a>         
                <span>CRIAR CONTA!!</span>
            </div>
            
        <div class="all">
            <form class="form" action = "cadastrar.php" method="post">
                <div class="dados">
                    <span>DADOS PESSOAIS</span>
                    <label>Nome:</label>
                    <input type="text" name = "nome" placeholder="Nome:">
                    <label>Sobrenome:</label>
                    <input type="text" name = "sobrenome" placeholder="Nome:">
                    <label>E-mail:</label>
                    <input type="email" name="email" placeholder="E-mail:">
                    <label>Senha:</label>
                    <input type="password" name = "senha" placeholder="Senha:">
                    <label>Cartão de crédito:</label>
                    <input type="number" name = "cart_credit" placeholder="0000 0000 0000 0000">
                    <label>Data de nascimento:</label>
                    <input type="date" name = "data_nasc" placeholder="00/00/0000:">
                </div>
                <div class="endereco">
                    <span>ENDEREÇO</span>
                    <label>Rua:</label>
                    <input type="text" name = "rua" placeholder="Rua:">
                    <label>Cidade:</label>
                    <input type="text" name = "cidade" placeholder="Cidade:">
                    <label>Numero da casa:</label>
                    <input type="number" name = "num_casa" placeholder="Numero da casa:">
                    <label>Bairro:</label>
                    <input type="text" name = "bairro" placeholder="Bairro:">
                    <label>Cep:</label>
                    <input type="number" name = "cep" placeholder="Cep:">
                    <input type="submit" value="cadastrar">
                </div>
            </form>
            <div class="btn">
                <!--<a href="#">
                    <button value=criar id="logi">CRIAR</button>
                </a>-->
            </div>
        </div>
        </div>
    </div>
</body>
</html>