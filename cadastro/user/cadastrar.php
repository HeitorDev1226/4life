<?php

require('../../database/conexao.php');

session_start(); // Inicia a sessão

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$data_nasc = $_POST['data_nasc'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$num_casa = $_POST['num_casa'];
$cidade = $_POST['cidade'];
$cep = $_POST['cep'];
$cart_credit = $_POST['cart_credit'];

$sql = "INSERT INTO usuarios (nome, sobrenome, email, senha, data_nasc, rua, bairro, num_casa, cidade, cep, cart_credit) 
        VALUES ('$nome', '$sobrenome', '$email', '$senha', '$data_nasc', '$rua', '$bairro', '$num_casa', '$cidade', '$cep', '$cart_credit')";

if ($ponte->query($sql) === TRUE) {
  echo "Registro inserido com sucesso!";
  
  // Cria as variáveis de sessão
  $_SESSION['email'] = $email;
  $_SESSION['senha'] = $senha;
  $_SESSION['idusuario'] = $ponte->insert_id; // Obtém o ID do usuário recém-criado
  
  // Redireciona para a página cadastrado.php passando o ID do usuário como parâmetro
  header("Location: ../../principal_pages/cadastrado/cadastrado.php?idusuario=" . $_SESSION['idusuario']);
  exit;
} else {
  echo "Erro ao inserir registro: " . $ponte->error;
}

?>
