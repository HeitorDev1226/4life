<?php
    require_once ('../../../database/conexao.php');
    $id_prod = $_POST['id_prod'];

    $sql = "SELECT * FROM produtos WHERE id = $id_prod";
    $query = mysqli_query($ponte, $sql);

    // Verifica se o produto existe
    if (mysqli_num_rows($query) > 0) {
    $produto = mysqli_fetch_assoc($query);
    $id_produto = $produto['id'];
    $nome = $produto['nome_prod'];
    $cor = $produto['cor_prod'];
    $tamanho = $produto['tamanho_prod'];
    $info = $produto['info_prod'];
    $preco = $produto['preco_prod'];
    $foto = $produto['foto_prod'];
    // Resto da lógica para exibir os detalhes do produto...
    } else {
        echo '<script>alert("Produto não encontrado!");</script>';
       sleep(2);
       header("location: ../read/menu/menu.php");
    }

    $sql_catg = "SELECT fk_categorias_id FROM produtos WHERE id = $id_produto";
    $query_catg = mysqli_query($ponte, $sql_catg);
    $row = mysqli_fetch_assoc($query_catg);
    $categoria_do_produto = $row['fk_categorias_id'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta n ame="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE PRINCIPAL</title>
    <link rel="stylesheet" href="update.css">
    <link rel="icon" href="../../../assets/logo.png">
</head>
<body>
    <div class="cont">
        <div class="container">
            <div class="voltar">
                <a href="../read/menu/menu.php">
                    <img src="../../../assets/seta_voltar.png">
                </a>           
            </div>
            <span>ALTERAR PRODUTO</span>
            
                <form method="post" action="processamento.php" class="form">
                <div class="dados">
                    <label>ID DO PRODUTO:</label>
                    <input readonly="true" type="number" name="id" value="<?php echo $id_produto; ?>">
                    <label>COR:</label>
                    <input type="text" name="cor_prod" value="<?php echo $cor; ?>">
                    <label>NOME:</label>
                    <input type="text" name="nome_prod" value="<?php echo $nome; ?>">
                    <label>LINK DA FOTO</label>
                    <input type="text" name="foto_prod" value="<?php echo $foto; ?>">
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
                    <label>CATEGORIA:</label>
                        <select name="catg_prod">
                            <?php
                            $sql_nome = "SELECT * FROM categorias ORDER BY nome_catg";
                            $query_nome = mysqli_query($ponte, $sql_nome);
                            while ($catg = mysqli_fetch_array($query_nome)) {
                                $codigo = $catg['id'];
                                $nome = $catg['nome_catg'];
                                $selected = ($codigo == $categoria_do_produto) ? "selected" : "";
                                ?>
                                <option value="<?php echo $codigo ?>" <?php echo $selected ?>><?php echo $nome ?></option>
                            <?php } ?>
                        </select>
                    <label>INFORMAÇÕES:</label>
                    <input type="text" name="info_prod" value="<?php echo $info; ?>"> 
                </div>
                <div class="dado">
                    <label>PREÇO:</label>
                    <input type="number" name="preco_prod"  value="<?php echo $preco; ?>">
                        <input type="submit" value="ALTERAR">
                    </div>
                </div>
                </form>
        </div>
    </div>
</div>
<script src=""></script>
</body>
</html>