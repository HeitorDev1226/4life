<!-- Página principal -->
<!-- Exibir lista de produtos -->
<?php 
    require('../database/conexao.php');
?>

<ul>
    <li>
        <form action="product.php" method="get">
            <input type="hidden" name="id" value="1">
            <button type="submit">Produto 1</button>
        </form>
    </li>
    <li>
        <form action="product.php" method="get">
            <input type="hidden" name="id" value="arroba">
            <button type="submit">Produto 2</button>
        </form>
    </li>
    <!-- Adicionar mais produtos aqui -->
</ul>
