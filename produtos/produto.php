<?php
require('../database/conexao.php');
session_start();

if (isset($_GET['id'])) {
    $id_prod = $_GET['id'];

    $sql = "SELECT * FROM produtos WHERE id = $id_prod";
    $query = mysqli_query($ponte, $sql);

    if (mysqli_num_rows($query) > 0) {
        $dados = mysqli_fetch_assoc($query);
        $nome = $dados['nome_prod'];
        $preco = $dados['preco_prod'];
        $tamanho = $dados['tamanho_prod'];
        $foto = $dados['foto_prod'];
        $cor = $dados['cor_prod'];
      
    }
} else {
    echo "falha: " . $ponte->error;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="produto.css">
    <link rel="stylesheet" href="https://kit.fontawesome.com/6859528c9f.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Kumar+One&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="cont">
            <div class="set_voltar">
                <a href="../categorias/blusas.php">
                    <img src="../assets/seta_voltar.png" alt="icone de voltar">
                </a>
            </div>
            <div class="logo">
                <a href="../principal_pages/cadastrado/cadastrado.php">
                    <p>4life</p>
                </a>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="foto_prod">
                <img src="<?php echo $foto; ?>" alt="">
            </div>
            <div class="dados_prod">
                <div class="name" name="nome_prod">
                    <p>NOME: <?php echo $nome; ?></p>
                </div>
                <div class="preço">
                    <p>PREÇO: <?php echo "R$" . $preco; ?></p>
                </div>
                <div class="cores">
                    <div>
                        <p>Cores:</p>
                    </div>
                    <div class="tamanhos">
                        <select class="select" name="select">
                            <?php
                            $sql = "SELECT cor_prod FROM produtos WHERE id IN(65, 102, 104, 105, 106, 107)";
                            $query = mysqli_query($ponte, $sql);
                            while ($info_cor = mysqli_fetch_array($query)) {
                                $codigo = $info_cor['cor_prod'];
                                $cor = $info_cor['cor_prod'];
                                if ($codigo !== null) {
                            ?>
                                    <option name="cor_prod" value="<?php echo $codigo ?>"><?php echo $cor; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="tamanhos">
                    <div>
                        <p>Tamanhos:</p>
                    </div>
                    <div class="tamanhos">
                        <select class="select" name="select">
                            <?php
                            $sql = "SELECT DISTINCT tamanho_prod FROM produtos ORDER BY tamanho_prod";
                            $query = mysqli_query($ponte, $sql);
                            while ($info = mysqli_fetch_array($query)) {
                                $tamanho = $info['tamanho_prod'];
                                if (!empty($tamanho)) {
                                    echo '<option value="' . $tamanho . '">' . $tamanho . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="fav">
                    <form action="../cart/cart-cheio/cheio.php" method="POST" class="fav">
                        <!-- Campos ocultos com os dados do produto -->
                        <input type="hidden" name="id" value="<?php echo $id_prod; ?>">
                        <input type="hidden" name="preco" value="<?php echo $preco; ?>">
                        <input type="hidden" name="nome" value="<?php echo $nome; ?>">
                        <input type="hidden" name="foto" value="<?php echo $foto; ?>">
                        <input type="submit" name="adicionar_carrinho" value="adicionar ao carrinho">
                    </form>
                </div>
                <div class="fav">
                <form action="../favoritos/favoritos.php" method="POST" class="fav">
                <input type="hidden" name="id" value="<?php echo $id_prod; ?>">
                        <input type="hidden" name="preco" value="<?php echo $preco; ?>">
                        <input type="hidden" name="nome" value="<?php echo $nome; ?>">
                        <input type="hidden" name="foto" value="<?php echo $foto; ?>">
                    <input type="submit" name="adicionar_favorito" value="adicionar aos favoritos">
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
