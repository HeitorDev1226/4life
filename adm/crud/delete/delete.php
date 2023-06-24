<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>deletando produto</title>
    <link rel="stylesheet" href="delete.css">
</head>
<body>
    <div class="cont">
        <div class="container">
            <div class="voltar">
                <a href="../read/menu/menu.php">
                    <img src="../../../assets/seta_voltar.png">
                </a>           
            </div>
            <form action="veradm.php" method="POST">
            <span>DELETAR PRODUTO</span>
            <div class="opcoes">
                <label>ID DO PRODUTO</label>
                <div class="a">
                    <input type="number" id="id" name="prod_id">
                </div>
                <label>MOTIVO PRA DELETAR</label>
                <div class="a">
                    <input type="text" id="mot" name="motivo_delete">
                </div>
                <div class="but">
                <input type="submit" value="deletar"
            </div>
            </div>
            
            </form>
        </div>
    </div>
</body>
</html>