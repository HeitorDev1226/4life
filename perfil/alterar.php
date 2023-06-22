<?php
    require('../database/conexao.php');
    session_start();
    $id = $_GET['id'];
    $sql_perfil = "SELECT * FROM usuarios
    WHERE id = $id";
    $query_perfil = mysqli_query($ponte, $sql_perfil);

    if(mysqli_num_rows($query_perfil) > 0){
        $dados = mysqli_fetch_assoc($query_perfil);
        $id = $dados['id'];
        $nome = $dados['nome'];
        $sobrenome = $dados['sobrenome'];
        $email = $dados['email'];
        $senha = $dados['senha'];
        $data_nasc = $dados['data_nasc'];
        $rua = $dados['rua'];
        $bairro = $dados['bairro'];
        $num_casa = $dados['num_casa'];
        $cep = $dados['cep'];
        $cart_credit = $dados['cart_credit'];
        $cidade = $dados['cidade'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="alterar.css">
</head>
<body>
    <div class="cont">
        <div class="container">
            <div class="criar">
                <a href="perfil.php">
                    <img src="../assets/seta_voltar.png">
                </a>         
                <span>EDITE SUA CONTA!!</span>
            </div>
            
        <div class="all">
            <form class="form" action = "processamento.php" method="GET" onsubmit="return validarFormulario()">
                <div class="dados">
                    <span>DADOS PESSOAIS</span>
                    <label>iD:</label>
                    <input type="text" readonly="true" name = "id" placeholder="Nome:" value="<?php echo $id; ?>">
                    <label>Nome:</label>
                    <input type="text" name = "nome" placeholder="Nome:" value="<?php echo $nome; ?>">
                    <label>Sobrenome:</label>
                    <input type="text" name = "sobrenome" placeholder="Nome:" value="<?php echo $sobrenome; ?>">
                    <label>E-mail:</label>
                    <input type="email" name="email" placeholder="E-mail:" value="<?php echo $email; ?>">
                    <label>Senha:</label>
                    <input type="password" name = "senha" placeholder="Senha:" value="<?php echo $senha; ?>">
                    <label>Cartão de crédito:</label>
                    <input type="number" name = "cart_credit" placeholder="0000 0000 0000 0000" value="<?php echo $cart_credit; ?>">
                    <label>Data de nascimento:</label>
                    <input type="date" name = "data_nasc" placeholder="00/00/0000:" value="<?php echo $data_nasc; ?>">
                </div>
                <div class="endereco">
                    <span>ENDEREÇO</span>
                    <label>Rua:</label>
                    <input type="text" name = "rua" placeholder="Rua:" value="<?php echo $rua; ?>">
                    <label>Cidade:</label>
                    <input type="text" name = "cidade" placeholder="Cidade:" value="<?php echo $cidade; ?>">
                    <label>Numero da casa:</label>
                    <input type="number" name = "num_casa" placeholder="Numero da casa:" value="<?php echo $num_casa; ?>">
                    <label>Bairro:</label>
                    <input type="text" name = "bairro" placeholder="Bairro:" value="<?php echo $bairro; ?>">
                    <label>Cep:</label>
                    <input type="number" name = "cep" placeholder="Cep:" value="<?php echo $cep; ?>">
                    <input type="submit" value="EDITAR">
                </div>
            </form>
            <div class="btn">
            </div>
        </div>
        </div>
    </div>
    <script>
             function validarFormulario() {
  // Obter os valores dos campos do formulário
  var nome = document.getElementsByName('nome')[0].value;
  var sobrenome = document.getElementsByName('sobrenome')[0].value;
  var email = document.getElementsByName('email')[0].value;
  var senha = document.getElementsByName('senha')[0].value;
  var cartaoCredito = document.getElementsByName('cart_credit')[0].value;
  var dataNascimento = document.getElementsByName('data_nasc')[0].value;
  var rua = document.getElementsByName('rua')[0].value;
  var cidade = document.getElementsByName('cidade')[0].value;
  var numCasa = document.getElementsByName('num_casa')[0].value;
  var bairro = document.getElementsByName('bairro')[0].value;
  var cep = document.getElementsByName('cep')[0].value;

  // Expressões regulares para validar os campos
  var regexNome = /^[a-zA-ZÀ-ú\s']+$/;
  var regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  var regexSenha = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{6,}$/;
  var regexCartaoCredito = /^\d{16}$/;
  var regexDataNascimento = /^(19|20)\d{2}-(0\d|1[0-2])-([0-2]\d|3[01])$/;
  var regexRua = /^[a-zA-ZÀ-ú\s']+$/;
  var regexBairro = /^[a-zA-ZÀ-ú\s']+$/;
  var regexCep = /^\d{8}$/;

  // Variável para rastrear erros de validação
  var isValid = true;

  // Validar o campo Nome
  if (!nome.match(regexNome)) {
    isValid = false;
    alert('Por favor, digite um nome válido (sem números ou caracteres especiais).');
  }

  // Validar o campo Sobrenome
  if (!sobrenome.match(regexNome)) {
    isValid = false;
    alert('Por favor, digite um sobrenome válido (sem números ou caracteres especiais).');
  }

  // Validar o campo E-mail
  if (!email.match(regexEmail)) {
    isValid = false;
    alert('Por favor, digite um e-mail válido.');
  }

  // Validar o campo Senha
  if (!senha.match(regexSenha)) {
    isValid = false;
    alert('Por favor, digite uma senha válida (mínimo de 6 caracteres, com pelo menos uma letra maiúscula e um número).');
  }

  // Validar o campo Cartão de crédito
  // Obtém o valor do campo "cart_credit"
var cartCredit = document.querySelector('input[name="cart_credit"]').value;

// Remove todos os caracteres não numéricos
var cartCreditDigits = cartCredit.replace(/\D/g, '');

// Verifica se o número de caracteres é igual a 16
if (cartCreditDigits.length !== 16) {
    alert("O número do cartão de crédito deve conter exatamente 16 dígitos.");
    return false; // Impede o envio do formulário
}

  // Validar o campo Data de nascimento
  var dataNascimento = document.querySelector('input[name="data_nasc"]').value;
  var anoAtual = new Date().getFullYear();
  var anoNascimento = new Date(dataNascimento).getFullYear();
  var idade = anoAtual - anoNascimento;

  if (idade < 18) {
    alert('Você deve ter pelo menos 18 anos para se cadastrar.');
    return false; // Impede o envio do formulário
  }
  // Validar o campo Rua
  if (!rua.match(regexRua)) {
    isValid = false;
    alert('Por favor, digite um nome de rua válido (sem números ou caracteres especiais).');
  }

  // Validar o campo Cidade
  if (!cidade.match(regexNome)) {
    isValid = false;
    alert('Por favor, digite um nome de cidade válido (sem números ou caracteres especiais).');
  }

  // Validar o campo Número da casa
  if (numCasa === '' || isNaN(numCasa)) {
    isValid = false;
    alert('Por favor, digite um número de casa válido (somente números).');
  }

  // Validar o campo Bairro
  if (!bairro.match(regexBairro)) {
    isValid = false;
    alert('Por favor, digite um nome de bairro válido (sem números ou caracteres especiais).');
  }

  // Validar o campo CEP
  if (!cep.match(regexCep)) {
    isValid = false;
    alert('Por favor, digite um CEP válido (8 dígitos).');
  }

  // Retornar true ou false com base na validação do formulário
  return isValid;
}

    </script>
</body>
</html>