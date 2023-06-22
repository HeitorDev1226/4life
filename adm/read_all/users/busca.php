
<?php
    require('../../../database/conexao.php');

    $id_user = $_POST['id_user'];
    $sql_user = "SELECT * from usuarios WHERE id= $id_user";
    $query_user = mysqli_query($ponte, $sql_user);
   
    if(mysqli_num_rows($query_user) > 0){
        $dados_user = mysqli_fetch_assoc($query_user);
        $id = $dados_user['id'];
        $nome = $dados_user['nome'];
        $sobrenome = $dados_user['sobrenome'];
        $email = $dados_user['email'];
        $senha = $dados_user['senha'];
        $data_nasc = $dados_user['data_nasc'];
        $rua = $dados_user['rua'];
        $bairro = $dados_user['bairro'];
        $num = $dados_user['num_casa'];
        $cep = $dados_user['cep'];
        $cart = $dados_user['cart_credit'];
    }else{
        echo "usuário não encontrado!";
        header("location: usuarios.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pagina dos usuarios</title>
    <link rel="stylesheet" href="busca.css">
    <link rel="icon" href="../../../assets/logo.png">
    <link rel="stylesheet" href="https://kit.fontawesome.com/6859528c9f.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Kumar+One&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <ul class="head">
            <li class="set-voltar">
                <a href="../users/usuarios.php">
                    <img src="../../../assets/seta_voltar.png" alt="icone de voltar">
                </a>
            </li>
            <li class="logo">
                <a href="../../../principal_pages/adm/adm.php">
                    <p>4life</p>
                </a>
            </li>
            <li class="usuario">
                <p>Usuários</p>
            </li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </header>
    <main>
        <form method="POST" action="busca.php" class="src">
            <input type="number" name ="id_user">
            <button type="submit">
                <a href="busca_user.php">
                <img src="../../../assets/lupa_branca.png" alt="">
                </a>
            </button>
        </form>
        <form action="">
            <div class="pedidos">
                <ul>
                    <div class="name_id">
                        <li>NOME: <?php echo $nome; ?></li>
                        <li>ID: <?php echo $id; ?> </li>
                    </div>
                    <div class="opcoes">
                        <div class="inform">
                            <li>Informaçao Do Usuário: </li>
                            <li>email: <?php echo $email; ?></li>
                            <li>Senha: <?php echo $senha; ?></li>
                            <li>Data de Nascimento: <?php echo $data_nasc; ?></li>
                            <li>Número da casa: <?php echo $num; ?></li>
                            <li>Cep: <?php echo $cep; ?></li>
                            <li>Rua: <?php echo $rua; ?></li>
                            <li>Bairro: <?php echo $bairro; ?></li>
                            <li>número do cartão: <?php echo $cart; ?></li>
                        </div>
                        <div class="bloq">
                        <a href="delete_user.php?id=<?php echo $id; ?>">
                            <li>Excluir Usuário</li>
                            </a>
                        </div>
                    </div>
                </ul>
            </div>
        </form>
    </main>
</body>
</html>