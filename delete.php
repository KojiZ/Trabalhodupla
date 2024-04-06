<?php
include_once'config/connection.php';

$conn = connection();

if (isset($_GET['idregistro'])) {
  $id = $_GET['idregistro'];
  $delete = "DELETE FROM registros WHERE idregistros = :id";
  $delete = $conn->prepare($delete);
  $delete->bindParam(':id', $id);
  $conn->beginTransaction();
  $delete->execute();
  $conn->commit();
  header('location:dashboard.php?page=registro');
}

if (isset($_GET['idadm'])) {
  $id = $_GET['idadm'];
  $delete = "DELETE FROM adm WHERE idadm = :id";
  $delete = $conn->prepare($delete);
  $delete->bindParam(':id', $id);
  $conn->beginTransaction();
  $delete->execute();
  $conn->commit();
  header('location:dashboard.php?page=adm');
}

if (isset($_GET['idcliente'])) {
  $id = $_GET['idcliente'];
  $delete = "DELETE FROM cliente WHERE idcliente = :id";
  $delete = $conn->prepare($delete);
  $delete->bindParam(':id', $id);
  $conn->beginTransaction();
  $delete->execute();
  $conn->commit();
  header('location:dashboard.php?page=cliente');
}

if (isset($_GET['idservico'])) {
  $id = $_GET['idservico'];
  $delete = "DELETE FROM servico WHERE idservico = :id";
  $delete = $conn->prepare($delete);
  $delete->bindParam(':id', $id);
  $conn->beginTransaction();
  $delete->execute();
  $conn->commit();
  header('location:dashboard.php?page=servico');
}


