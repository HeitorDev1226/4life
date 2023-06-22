<?php
    
    require('../../database/conexao.php');

    $id_adm = $_POST['id_adm'];
    $sql_select = "SELECT * FROM administradores WHERE id= $id_adm";
    $query_select = mysqli_query($ponte, $sql_select);

    if(mysqli_num_rows($query_select) > 0){
        $dados = mysqli_fetch_assoc($query_select);
        $nome = $dados['nome'];
        $email = $dados['email'];
        $senha = $dados['senha']; 
        $rg = $dados['rg'];
        $cpf = $dados['cpf'];
        $data_nasc = $dados['data_nasc'];
    }else{
        echo "não foi encontrado nenhum adm com o id inserido";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="editar.css">
</head>
<body>
    <div class="cont">
        <div class="container">
            <div class="criar">
                <a href="../../principal_pages/adm/adm.php">
                    <img src="../../assets/seta_voltar.png">
                </a>         
                <span>EDITAR INFORMAÇÕES DO ADM</span>
            </div>
            
        <div class="all">
            <form class = "form" action = "processamento.php" method = "post">
                <div class="dados">
                    <span>DADOS PESSOAIS</span>
                    <label>id:</label>
                    <input type="text" readonly="true" name = "id" value="<?php echo $id_adm ?>">
                    <label>Nome:</label>
                    <input type="text" name = "nome" placeholder="Nome:" value="<?php echo $nome ?>">
                    <label>E-mail:</label>
                    <input type="email" name="email" placeholder="E-mail:" value="<?php echo $email ?>">
                    <label>Senha:</label>
                    <input type="password" name = "senha" placeholder="Senha:" value="<?php echo $senha ?>">
                    <label>RG:</label>
                    <input type="number" name = "rg" placeholder="0000 0000 0000 0000" value="<?php echo $rg ?>">
                    <label>CPF:</label>
                    <input type="number" name = "cpf" placeholder="0000 0000 0000 0000" value="<?php echo $cpf ?>">
                    <label>Data de nascimento:</label>
                    <input type="date" name = "data_nasc" placeholder="00/00/0000:" value="<?php echo $data_nasc ?>">
                    <input type="submit" value="SALVAR">
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