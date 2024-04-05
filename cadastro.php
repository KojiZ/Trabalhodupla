<?php
session_start();
include_once("config/connection.php");


if (isset($_POST['clienteselec'])) {
    $conn = connection();
    $idcliente = $_POST['clienteselec'];
    $idservico = $_POST['servicoselec'];
    $idadm = $_POST['idadmselec'];
    $prazoEntrega = $_POST['prazoEntrega'];
    $valorContratado = $_POST['contratoselec'];
    $valorEntrada = $_POST['entradaselec']; 
    $pagamentoselec = $_POST['pagamentoselec'];
    $register = $conn->prepare("INSERT INTO registros (idcliente, idformapagamento, idservico, idadm, prazoEntrega, valorContratado, valorEntrada) 
    VALUES (:idcliente, :idformapagamento, :idservico, :idadm, :prazoEntrega, :valorContratado, :valorEntrada)");
    $register->bindParam(":idcliente", $idcliente);
    $register->bindParam(":idformapagamento", $pagamentoselec);
    $register->bindParam(":idservico", $idservico);
    $register->bindParam(":idadm", $idadm);
    $register->bindParam(":prazoEntrega", $prazoEntrega);
    $register->bindParam(":valorContratado", $valorContratado); 
    $register->bindParam(":valorEntrada", $valorEntrada); 
    $conn->beginTransaction();
    $register->execute();
    $conn->commit();
    header("Location: final.php");
}
