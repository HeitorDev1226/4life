<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ler.css">
    <title>ler</title>
</head>
<body>
    
</body>
</html>

<?php
     
    require('../../../database/conexao.php');

    $id = $_POST['id_prod'];

    $sql  = "SELECT * FROM produtos WHERE id = $id";
    $query = mysqli_query($ponte,$sql);

    $sql_catg = "SELECT produtos.*, categorias.nome_catg FROM produtos INNER JOIN categorias ON produtos.fk_categorias_id = categorias.id WHERE produtos.id = $id";
    $query_catg = mysqli_query($ponte, $sql_catg);
    
    if (mysqli_num_rows($query_catg) > 0) {
        $row_catg = mysqli_fetch_assoc($query_catg);
        $nomeCategoria = $row_catg['nome_catg'];
    }
   
    if (mysqli_num_rows($query) > 0) {
        // Exibe os dados
        while ($row = mysqli_fetch_assoc($query)) {
        echo "<br>";
        echo "ID: " . $row["id"] . "<br>";
        echo "NOME: " . $row["nome_prod"] . "<br>";
        echo "PREÇO: " . $row["preco_prod"] . "<br>";
        echo "COR: " . $row["cor_prod"] . "<br>";
        echo "TAMANHO: " . $row["tamanho_prod"] . "<br>";
        echo "INFORMAÇÕES: " . $row["info_prod"] . "<br>";
        echo "CATEGORIA: " . $nomeCategoria . "<br>";
        }
    } else {
        echo "Nenhum resultado encontrado.";
    }

    
    