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

