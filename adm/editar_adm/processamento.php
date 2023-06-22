    <?php
        require('../../database/conexao.php');

    $id_adm = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha']; 
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $data_nasc = $_POST['data_nasc'];

    $sql_update = "UPDATE administradores SET nome = '$nome', email = '$email', senha = '$senha', rg = '$rg', cpf = '$cpf', data_nasc = '$data_nasc' WHERE id= $id_adm";
    $query_update = mysqli_query($ponte, $sql_update);

    if($query_update){
        echo "registro alterado com extremo sucesso!";
    }else{
        echo "falha a alterar registro" . $ponte->error;
    }
?>