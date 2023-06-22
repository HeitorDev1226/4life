
<?php
    require('../database/conexao.php');

    $sql_perfil = "SELECT * FROM administradores
    WHERE id = (SELECT MAX(id) FROM administradores)";
    $query_perfil = mysqli_query($ponte, $sql_perfil);

    if(mysqli_num_rows($query_perfil) > 0){
        $dados = mysqli_fetch_assoc($query_perfil);
        $id = $dados['id'];
        $nome = $dados['nome'];
        $email = $dados['email'];
        $senha = $dados['senha'];
        $data_nasc = $dados['data_nasc'];
        $cpf = $dados['cpf'];
        $rg = $dados['rg'];
    }else{
        echo "esse usuário não existe!";
    }


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="icon" href="..//assets/logo.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pagina de perfil</title>
    <link rel="stylesheet" href="perfil.css">
</head>
<body>
    <div class="cont">
        <div class="container">
            <div class="set-voltar">
                <a href="../principal_pages/adm/adm.php">
                    <img src="../assets/seta_voltar.png" alt="icone de voltar">
                </a>
            </div>
            <ul class="dados">
                <div class="name_id">
                    <li class="nome">
                        <p>NOME: <?php echo $nome;?></p>
                    </li>
                    <li class="nome">
                        <p>ID: <?php echo $id;?></p>
                    </li>
                </div>
                <li class="dados_do_usuario">
                    <div class="endereco">
                        <p>Cpf: <?php echo $cpf;?></p>
                        <p>Rg: <?php echo $rg;?></p>
                        <p>Email: <?php echo $email;?></p>
                        <p>data de nascimento: <?php echo $data_nasc;?></p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>