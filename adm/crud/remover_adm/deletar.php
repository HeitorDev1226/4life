<?php
  require('../../../database/conexao.php');

  $id = $_POST['id_adm'];

  $sql = "DELETE FROM administradores WHERE id = $id";

mysqli_prepare($ponte, $sql);
if ($ponte->query($sql) === TRUE) {
  echo "ADM demitido com sucesso!";
} else {
  echo "Erro ao deletar registro: " . $ponte->error;
}
?>