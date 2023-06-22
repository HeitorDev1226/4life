
<?php
    require('../database/conexao.php');
    session_start();
    $id = $_GET['id'];
    $sql_perfil = "SELECT id, nome, sobrenome, email, senha, data_nasc, rua, bairro, num_casa, cidade, cep, cart_credit
    FROM usuarios
    WHERE id = $id";
    $query_perfil = mysqli_query($ponte, $sql_perfil);

    if(mysqli_num_rows($query_perfil) > 0){
        $dados = mysqli_fetch_assoc($query_perfil);
        $id = $dados['id'];
        $nome = $dados['nome'];
        $sobrenome = $dados['sobrenome'];
        $email = $dados['email'];
        $senha = $dados['senha'];
        $data_nasc = $dados['data_nasc'];
        $rua = $dados['rua'];
        $bairro = $dados['bairro'];
        $num_casa = $dados['num_casa'];
        $cep = $dados['cep'];
        $cart_credit = $dados['cart_credit'];
        $cidade = $dados['cidade'];
    }else{
        echo "esse usuário não existe!";
    }


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="icon" href="../assets/logo.png">
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
                <a href="../principal_pages/cadastrado/cadastrado.php?id= <?php echo $id; ?>">
                    <img src="../assets/seta_voltar.png" alt="icone de voltar">
                </a>
            </div>
            
            <form class="dados" method="GET" action="alterar.php">
                <div class="name_id">
                    <li class="nome">
                        <p>NOME: <?php echo $nome ." " . $sobrenome;?></p>
                        <p>EMAIL: <?php echo $email;?></p>
                    </li>
                    <li class="nome">
                        <p>ID: <?php echo $id; ?></p>
                    </li>
                </div>
                <li class="dados_do_usuario">
                    <div class="endereco">
                        <p>Rua: <?php echo $rua; ?></p>
                        <p>Cidade: <?php echo $cidade; ?></p>
                        <p>Numero da casa: <?php echo $num_casa; ?></p>
                        <p>Bairro: <?php echo $bairro; ?></p>
                        <p>Cep: <?php echo $cep; ?></p>
                        <p>Data de Nascimento: <?php echo $data_nasc; ?></p>
                        <p>E-mail: <?php echo $email; ?></p>    
                        <br> 
                    </div>
                </li>
            </form>
            <a href="alterar.php?id=<?php echo $id; ?>">
                <button>
                    alterar perfil
                </button>
            </a>
        </div>
    </div>
    <form method="POST" action="logout.php">
    <input type="submit" value="Logout">
    </form>
</body>
</html>