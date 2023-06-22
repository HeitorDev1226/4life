
<?php
    require('../../../database/conexao.php');
    $sql = "SELECT * FROM usuarios ORDER BY id DESC LIMIT 5";
    $query = mysqli_query($ponte, $sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pagina dos usuarios</title>
    <link rel="stylesheet" href="usuarios.css">
    <link rel="icon" href="../../../assets/logo.png">
    <link rel="stylesheet" href="https://kit.fontawesome.com/6859528c9f.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Kumar+One&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <ul class="head">
            <li class="set-voltar">
                <a href="../../../principal_pages/adm/adm.php">
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
        </ul>
    </header>
    <main>
        <form method="POST" action="busca.php" class="src">
            <input type="number" name ="id_user">
            <button type="submit" value="buscar">
                <a href="busca_user.php">
                <img src="../../../assets/lupa_branca.png" alt="">
                </a>
            </button>
            <h4 id="h4">CONTAS RECENTES</h4>
        </form>
        <?php
               // Exibe os produtos da categoria "Blusas"
               while ($row = mysqli_fetch_assoc($query)) {
                   $id = $row['id'];
                   $nome = $row['nome'];
                   $sobrenome = $row['sobrenome'];
                   ?>
        <form action="">
            <div class="pedidos">
                <ul>
                    <div class="name_id">
                        <li class="name_id">NOME: <?php echo $nome . " " . $sobrenome; ?></li>
                        <li class="name_id">ID: <?php echo $id; ?> </li>
                    </div>
                    <div class="opcoes">
                    <a href="formUser.php?id=<?php echo $id; ?>">
                        <li class="inform">alterar</li>
                    </a>
                    <?php //var_dump($id); ?>
                    <a href="delete_user.php?id=<?php echo $id; ?>">
                    <li class="bloq">remover Usuário</li>
                    </a>
                    </div>
                </ul>
            </div>
            <?php } ?>
        </form>
    </main>
</body>
</html>