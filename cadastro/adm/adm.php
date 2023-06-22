<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cadastro.css">
</head>
<body>
    <div class="cont">
        <div class="container">
            <div class="criar">
                <a href="../../principal_pages/adm/adm.php">
                    <img src="../../assets/seta_voltar.png">
                </a>         
                <span>CRIAR CONTA</span>
            </div>
            
        <div class="all">
            <form class="form" id="cadastro_adm" name="form" action="cadastrar_adm.php" method="post" onsubmit="return validar()">
                <div class="dados">
                    <span>DADOS PESSOAIS</span>
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" placeholder="Nome:" required>
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" placeholder="E-mail:" required>
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" placeholder="Senha:" required>
                    <label for="rg">RG:</label>
                    <input type="number" id="rg" name="rg" placeholder="0000 0000 0000 0000" required>
                    <label for="cpf">CPF:</label>
                    <input type="number" id="cpf" name="cpf" placeholder="0000 0000 0000 0000" required>
                    <label for="data_nasc">Data de nascimento:</label>
                    <input type="date" id="data_nasc" name="data_nasc" placeholder="00/00/0000:" required>
                    <input id="submit" type="submit" value="cadastrar_adm">
                </div>
            </form>
            <div class="btn">
            </div>
        </div>
        </div>
    </div>
    <script src="validate.js" defer></script>
</body>
</html>
