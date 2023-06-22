<?php
    require('../../../database/conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adicionando produto</title>
    <link rel="stylesheet" href="create.css">
</head>
<body>
    <div class="cont">
        <div class="container">
            <div class="voltar">
                <a href="../menu/menu.php"><img src="../../../assets/seta_voltar.png"></a>
            </div>
            <span>ADICIONAR PRODUTO</span>
            <form class="form" action="adicionar.php" method="POST" enctype='multipart/form-data'>
                <div class="dados">
                    <!--cor-->
                    <label>COR:</label>
                    <select name="cor_prod">
                        <?php
                        $sql = "SELECT cor_prod FROM produtos WHERE id IN(3, 4, 5)";
                        $query = mysqli_query($ponte, $sql);
                        while ($cor = mysqli_fetch_array($query)) {
                            $codigo = $cor['cor_prod'];
                            $nome = $cor['cor_prod'];
                            if ($codigo !== null) {
                        ?>
                             <option name="cor_prod" value="<?php echo $codigo ?>"><?php echo $nome ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <!--nome-->
                    <label>NOME:</label>
                    <input type="text" name="nome_prod">

                    <!--informações-->
                    <label>informações</label>
                    <input type="text" name="info_prod">

                    <!--tamanho-->
                    <label>TAMANHO:</label>
                    <select name="tamanho_prod">
                        <?php
                        $sql = "SELECT DISTINCT tamanho_prod FROM produtos ORDER BY tamanho_prod";
                        $query = mysqli_query($ponte, $sql);
                        while ($tamanho = mysqli_fetch_array($query)) {
                            $nome = $tamanho['tamanho_prod'];
                            if (!empty($nome)) {
                                echo '<option value="' . $nome . '">' . $nome . '</option>';
                            }
                        }
                        ?>
                    </select>

                    <!--preço-->
                    <label>Preço</label>
                    <input type="number" name="preco_prod">

                    <label>LINK DA FOTO</label>
                    <input type="text" name="picture__input">
                    <!--categoria-->
                    <label>CATEGORIA:</label>
                    <select name="categoria_prod">
                        <?php
                        $sql = "SELECT * FROM categorias order by nome_catg";
                        $query = mysqli_query($ponte, $sql);
                        while ($catg = mysqli_fetch_array($query)) {
                            $codigo = $catg['id'];
                            $nome = $catg['nome_catg']; ?>
                            <option value="<?php echo $codigo ?>"> <?php echo $nome ?></option>";
                        <?php } ?>
                        
                    </select>
                    <!--enviar-->
                    <input type="submit" value="adicionar">
                </div>
            </form>
        </div>
    </div>
    </div>
    <script src="form.js"></script>
</body>
</html>