<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>
    pagina principal
   </title>
   <link rel="icon" href="../../assets/logo.png">
   <link rel="stylesheet" href="adm.css">
   <link rel="stylesheet" href="https://kit.fontawesome.com/6859528c9f.css" crossorigin="anonymous">
   <link href="https://fonts.googleapis.com/css?family=Kumar+One&display=swap" rel="stylesheet">
</head>
<body onload="carregar()">
    <header>
        
            <ul class="head">
                <li>
                    <div id="menubutton">
                        <img src="../../assets/menu.png" alt="menu">
                    </div>
                    <div id="menuPage" style="display: none; z-index: 2;" class="menuPage">
                        <div class="menuu">
                            <img id="closeButton" src="../../assets/menu.png" alt="menu">
                            <h1>MENU</h1>
                        </div>
                        <ul>
                            <li>
                                <a href="../../adm/crud/menu/menu.php">
                                    <p>AÇÕES DO ADMINISTRADOR</p>
                                </a>
                            </li>
                            <li>
                                <a href="../../adm/read_all/users/usuarios.php">
                                    <p>USUARIOS</p>
                                </a>
                            </li>
                            <li>
                                <a href="../../cadastro/adm/adm.php">
                                    <p>CADASTRAR NOVOS ADMINISTRADORES</p>
                                </a>
                            </li>
                            <li>
                                <a href="../../adm/editar_adm/dizerid.php">
                                    <p>EDITAR ADM</p>
                                </a>
                            </li>
                            <li>
                                <a href="../../adm/read_all/adms/adms.php">
                                    <p>CONSULTAR ADMINISTRADORES</p>
                                </a>
                            </li>
                            <li>
                                <a href="../../adm/crud/remover_adm/delete_adm.php">
                                    <p>REMOVER ADM</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <div class="menu">
                    <li>
                        <span>4life</span>
                    </li>
                    
                    </li>
                    <li class="perfil">
                        <a href="../../perfil/perfil_adm.php">
                            <img src="../../assets/profile.png" alt="imagem do perfil">
                        </a>
                    </li>
                </div>
            </ul>
    </header>
    <div class="carr">
        <div class="cont">
            <div class="imagem">
                <img id="imagem" src="../../assets/carrosel1.webp" alt="imagem">
                <div class="seta_frente">
                    <img id="seta" src="../../assets/seta_avancar.png" alt="">
                </div>
            </div>
            <div class="pontos">
                <ul>
                    <li id="ponto1"></li>
                    <li id="ponto2"></li>
                    <li id="ponto3"></li>
                </ul>
            </div>
        </div>
    </div>       
    <div class="categorias">
        <div class="categ">
            <a href="../../categorias/blusas.php" class="catego">
                <img src="../../assets/blusas.jpg">
            </a>
            <p>Blusas</p>
        </div>
        <div class="categ">
            <a href="../../categorias/calcas.php" class="catego">
                <img src="../../assets/calças.jpg">
            </a>
            <p>Calça</p>
        </div>
        <div class="categ">
            <a href="../../categorias/conjuntos.php" class="catego">
                <img src="../../assets/conjunto.png">
            </a>
            <p>Conjunto</p>
        </div>
        <div class="categ">
            <a href="../../categorias/roupfeminina.php" class="catego">
                <img src="../../assets/roupa-feminina.png">
            </a>
            <p>Roupa-feminina</p>
        </div>
        <div class="categ">
            <a href="../../categorias/jaquetas.php" class="catego">
                <img src="../../assets/jaquetas.jpg">
            </a>
            <p>Jaqueta</p>
        </div>
    </div>
    <div class="fotos">
        <div class="ft">
            <img src="" alt="foto de roupas" id="img">
        </div>
        <div class="ft">
            <img src="" alt="foto de roupas" id="img">
        </div>
        <div class="ft">
            <img src="" alt="foto de roupas" id="img">
        </div>
        <div class="ft">
            <img src="" alt="foto de roupas" id="img">
        </div>
        <div class="ft">
            <img src="" alt="foto de roupas" id="img">
        </div>
        <div class="ft">
            <img src="" alt="foto de roupas" id="img">
        </div>
        <div class="set">
            <img src="../../assets/seta_avancar.png" alt="foto de uma seta para a direita">
        </div>
    </div>
    <footer>
        <div class="rodape">
            <div>
                <img id="fourlife_logo" src="../../assets/logo.png">
            </div>
            <div class="redes_sociais">
                <p>nossas redes sociais</p>
                <a href="#">
                    <img src="../../assets/insta.png" alt="icone instagram">
                </a>
            </div>
        </div>
    </footer>
    <script src="adm.js"></script>
</body>
</html>