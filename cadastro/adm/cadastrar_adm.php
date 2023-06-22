<?php
    require('../../database/conexao.php');
   
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $data_nasc = $_POST['data_nasc'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];

    $sql = "INSERT INTO administradores(nome, email, senha, data_nasc, rg, cpf) VALUES('$nome', '$email', '$senha', '$data_nasc', '$rg', '$cpf')";
   
    if ($ponte->query($sql) === TRUE) {
      echo "Registro inserido com sucesso!";
    } else {
      echo "Erro ao inserir registro: " . $ponte->error;
    }
?>