<?php
    require('../database/conexao.php');

        //puxar o nome e o preço do BD
    $sql_dados = "SELECT id,nome_prod, preco_prod,foto_prod
    FROM produtos
    WHERE fk_categorias_id = 4
    AND id = (SELECT MAX(id) FROM produtos WHERE fk_categorias_id = 4)";
    $query_dados = mysqli_query($ponte, $sql_dados);

        //puxar a foto do BD
    $sql_foto = "SELECT foto_prod
    FROM produtos
    WHERE fk_categorias_id = 4
    AND id = (SELECT MAX(id) FROM produtos WHERE fk_categorias_id = 4)";
    $query_foto = mysqli_query($ponte,$sql_foto);
    
    $sql_dados2 = "SELECT nome_prod,preco_prod
    FROM produtos
    WHERE fk_categorias_id = 4
    ORDER BY id DESC
    LIMIT 1 OFFSET 1";
    $query_dados2 = mysqli_query($ponte,$sql_dados2);

    $sql_foto2 = "SELECT foto_prod
    FROM produtos
    WHERE fk_categorias_id = 4
    ORDER BY id DESC
    LIMIT 1 OFFSET 1";
    $query_foto2 = mysqli_query($ponte,$sql_foto2);

        //armazenar o nome e o preço do produto
    if ($query_dados && mysqli_num_rows($query_dados) > 0) {
        $produto = mysqli_fetch_assoc($query_dados);
        $preco = "preço: " . $produto['preco_prod'];
        $nome = $produto['nome_prod']; 
        $id = $produto['id'];
    } else {
        echo "dados inexistentes!"; 
    }

        //if pra pegar o link da foto
    if ($query_foto && mysqli_num_rows($query_foto) > 0) {
        $row = mysqli_fetch_assoc($query_foto);
        $fotoProd = $row['foto_prod'];
    }else{
        echo "não a links de foto aqui!";
    }

    if ($query_dados2 && mysqli_num_rows($query_dados2) > 0) {
        $produto2 = mysqli_fetch_assoc($query_dados2);
        $preco2 = "preço: " . $produto2['preco_prod'] . "<br>";
        $nome2 = $produto2['nome_prod'] . "<br>";  
        $id2 = $produto['id'];

    } else {
        echo "dados inexistentes!"; 
    }

    if ($query_foto2 && mysqli_num_rows($query_foto2) > 0) {
        $row2 = mysqli_fetch_assoc($query_foto2);
        $fotoProd2 = $row2['foto_prod'];
    }else{
        echo "não a links de foto aqui!";
    }

?>
