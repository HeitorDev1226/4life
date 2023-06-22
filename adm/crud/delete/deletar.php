<?php
  require('../../../database/conexao.php');

  $prod_id = $_POST['prod_id'];
  $motivo_delete = $_POST['motivo_delete'];

  $sql = "DELETE FROM produtos WHERE id = $prod_id";

mysqli_prepare($ponte, $sql);
if ($ponte->query($sql) === TRUE) {
  echo "Registro deletado com sucesso!";
} else {
  echo "Erro ao deletar registro: " . $ponte->error;
}
?>