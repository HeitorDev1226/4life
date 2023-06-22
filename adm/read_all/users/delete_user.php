<?php
    require('../../../database/conexao.php');

    $id_user = $_GET['id'];
    $sql = "DELETE FROM usuarios WHERE id = $id_user";
    $query = mysqli_query($ponte, $sql);

    if($query){
        echo "usuário apagado com sucesso!";
        header("location: usuarios.php");
    }else{
        echo "erro ao deletar!" . $ponte->error;
    }
?>