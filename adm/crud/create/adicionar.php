<?php

require('../../../database/conexao.php');

    $foto_prod = $_POST['picture__input'];
    $nome_prod = $_POST['nome_prod'];
    $preco_prod = $_POST['preco_prod'];
    $tamanho_prod = $_POST['tamanho_prod'];
    $info_prod = $_POST['info_prod'];
    $categoria_prod = $_POST['categoria_prod'];
    $cor_prod = $_POST['cor_prod'];

    $sql = "INSERT INTO produtos(foto_prod, nome_prod, preco_prod, tamanho_prod, info_prod, fk_categorias_id , cor_prod) VALUES('$foto_prod', '$nome_prod', '$preco_prod', '$tamanho_prod', '$info_prod', '$categoria_prod', '$cor_prod')";

//$query_cadastros = mysqli_query($ponte,$recebendo_cadastros);
mysqli_prepare($ponte, $sql);
if ($ponte->query($sql) === TRUE) {
  echo "Registro inserido com sucesso!";
} else {
  echo "Erro ao inserir registro: " . $ponte->error;
}
?>