<?php 
    require('../../../database/conexao.php');
    
    $id = $_POST['id'];
    $new_price = $_POST['preco_prod'];
    $new_info = $_POST['info_prod'];
    $new_name = $_POST['nome_prod'];
    $new_color = $_POST['cor_prod'];
    $new_size = $_POST['tamanho_prod'];
    $new_categories = $_POST['catg_prod'];
    $new_photo = $_POST['foto_prod'];

    $sql_update = "UPDATE produtos SET preco_prod = '$new_price', info_prod='$new_info', nome_prod='$new_name', cor_prod='$new_color', tamanho_prod='$new_size', fk_categorias_id='$new_categories', foto_prod='$new_photo' WHERE id=$id";
    $query_update = mysqli_query($ponte,$sql_update);

    if($query_update){
        echo "registro alterado com extremo sucesso!";
    }else{
        echo "falha a alterar registro" . $ponte->error;
    }

    session_start();
    $sql = "SELECT * FROM categorias order by nome_catg";
    $query = mysqli_query($ponte, $sql);
    while ($catg = mysqli_fetch_array($query)) {
        $codigo = $catg['id'];
        $nome = $catg['nome_catg'];
     }
     $_SESSION['id'] = $codigo;
     $_SESSION['nome_catg'] = $nome;

?>