<?php
    require('../database/conexao.php');
    session_start();   
    $id = $_GET['id'];
    $nome = $_GET['nome'];
    $sobrenome = $_GET['sobrenome'];
    $email = $_GET['email'];
    $senha = $_GET['senha'];
    $data_nasc = $_GET['data_nasc'];
    $rua = $_GET['rua'];
    $bairro = $_GET['bairro'];
    $num_casa = $_GET['num_casa'];
    $cep = $_GET['cep'];
    $cart_credit = $_GET['cart_credit'];
    $cidade = $_GET['cidade'];
    
     // Atualizar os dados
     $sql_alterar = "UPDATE usuarios SET nome = '$nome', sobrenome = '$sobrenome', email = '$email', senha = '$senha', data_nasc = '$data_nasc', rua = '$rua', bairro = '$bairro', num_casa = '$num_casa', cep = '$cep', cart_credit = '$cart_credit', cidade = '$cidade' WHERE id = $id";
     $query_alterar = mysqli_query($ponte, $sql_alterar);
 
     if($query_alterar) {

         echo "SEU REGISTRO FOI EDITADO!";
        $url = "perfil.php?id=" . $id;
        header("Location: " . $url);
        exit;
     } else {
         echo "Ocorreu um erro ao editar o registro: " . $ponte->error;
     }

?>