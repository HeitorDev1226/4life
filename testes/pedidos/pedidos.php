<?php
// Conexão com o banco de dados
$ponte = new mysqli("localhost", "root", "", "4life-bd");

// Verifica se a conexão foi estabelecida com sucesso
if ($ponte->connect_error) {
    die("Erro na conexão com o banco de dados: " . $ponte->connect_error);
}

// Consulta os pedidos da tabela "pedidos"
$sql = "SELECT p.*, u.nome AS nome_usuario, pr.nome AS nome_produto
        FROM pedidos p
        INNER JOIN usuarios u ON p.fk_usuarios_id = u.id
        INNER JOIN produtos pr ON p.fk_produtos_id = pr.id";
$result = $ponte->query($sql);

if ($result->num_rows > 0) {
    // Exibe os pedidos em uma tabela
    echo "<table>";
    echo "<tr><th>Usuário</th><th>Produto</th><th>Ações</th></tr>";

    while ($row = $result->fetch_assoc()) {
        $pedido_id = $row['pedidos_id'];
        $nome_usuario = $row['nome_usuario'];
        $nome_produto = $row['nome_produto'];

        echo "<tr>";
        echo "<td>$nome_usuario</td>";
        echo "<td>$nome_produto</td>";
        echo "<td>";
        echo "<button onclick=\"aceitarPedido($pedido_id)\">Aceitar</button>";
        echo "<button onclick=\"negarPedido($pedido_id)\">Negar</button>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Não há pedidos pendentes.";
}

$ponte->close();
?>
