<?php
require_once('../database/conexao.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtenha o email e a senha fornecidos pelo usuário no formulário de login  
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    // Verifique se o email e a senha são válidos
    $idusuario = verificarCredenciais($email, $senha);
    if ($idusuario) {
        // Dados de login corretos, criar a sessão para o usuário
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        $_SESSION['idusuario'] = $idusuario;
        // Redirecionar para a página de cadastrado
        header('Location: ../principal_pages/cadastrado/cadastrado.php?idusuario=' . $idusuario);
        exit();
    } else {
        // Verificar se o email e senha estão na tabela administradores
        if (verificarAdministradores($email, $senha)) {
            // Email e senha pertencem a um administrador, redirecionar para a página de administração
            header('Location: ../principal_pages/adm/adm.php');
            exit();
        } else {
            // Email ou senha inválidos, exiba uma mensagem de erro
            $mensagemErro = 'Email ou senha inválidos. Por favor, tente novamente.';
        }
    }
}

// Função para verificar se o email e a senha estão na tabela administradores
function verificarAdministradores($email, $senha) {
    $ponte = mysqli_connect('localhost', 'root', '', '4life-bd');
    $email = mysqli_real_escape_string($ponte, $email);
    $senha = mysqli_real_escape_string($ponte, $senha);
    $query = "SELECT id FROM administradores WHERE email = '$email' AND senha = '$senha'";
    $resultado = mysqli_query($ponte, $query);
    
    if ($resultado && mysqli_num_rows($resultado) > 0) {
        mysqli_close($ponte);
        return true;
    } else {
        mysqli_close($ponte);
        return false;
    }
}
// Função para verificar as credenciais do usuário no banco de dados
function verificarCredenciais($email, $senha) {
    $ponte = mysqli_connect('localhost', 'root', '', '4life-bd');
    $email = mysqli_real_escape_string($ponte, $email);
    $senha = mysqli_real_escape_string($ponte, $senha);
    $query = "SELECT id FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $resultado = mysqli_query($ponte, $query);
    
    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $row = mysqli_fetch_assoc($resultado);
        $idusuario = $row['id'];
        mysqli_close($ponte);
        return $idusuario;
    } else {
        mysqli_close($ponte);
        return false;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>
<body>
<?php if (isset($mensagemErro)) { ?>
        <p><?php echo $mensagemErro; ?></p>
    <?php } ?>
    <div class="cont">
        <div class="container">  
            <div class="voltar">
                <a href="../principal_pages/deslogado/deslogado.php">
                    <img src="../assets/seta_voltar.png">
                </a>           
            </div>
            <span id="bem">BEM-VINDO!</span>
            <span id="novo">Novo no site? <a href="user/cadastro.php" id="regi">Registre-se</a></span>
            <form class="dados" method="POST" action="login.php">
                <div class="a">
                    <label>E-mail:</label>
                    <input type="email" name="email" placeholder="E-mail">
                </div>
                <div class="a">
                    <label>Senha:</label>
                    <input type="password" name="senha" placeholder="Password">
                </div>
                <div class="but">    
                   <input type="submit" value="logar">
                </div>
                <div class="img">
                    <img src="../assets/google.png">
                </div>
            </form>
         </div>
    </div>
</body>
</html>
