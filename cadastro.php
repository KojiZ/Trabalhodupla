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
    $_SESSION['idcliente'] = $idcliente;
    $_SESSION['idservico'] = $idservico;
    $_SESSION['idadm'] = $idadm;
    $_SESSION['prazoEntrega'] = $prazoEntrega;
    $_SESSION['valorContratado'] = $valorContratado;
    $_SESSION['valorEntrada'] = $valorEntrada;
    $_SESSION['pagamentoselec'] = $pagamentoselec;
    header("Location: final.php");
}


if ( isset($_POST['nomecadadm'])) {
    $conn = connection();
    $nome = $_POST['nomecadadm'];
    $email = $_POST['emailcadadm'];
    $senha = $_POST['senhacadadm']; 
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
    $register = $conn->prepare("INSERT INTO adm (nome, email, senha) VALUES (:nome, :email, :senha)");
    $register->bindParam(':nome', $nome);
    $register->bindParam(':email', $email);
    $register->bindParam(':senha', $senha_hash);
    $register->execute();

    header('Location: dashboard.php?page=adm');
    exit; 
}

if ( isset($_POST['nomecadcli'])) {
    $conn = connection();
    $nome = $_POST['nomecadcli'];
    $sexo = $_POST['sexocadcli'];
    $cpf = $_POST['cpfcadcli']; 
    $register = $conn->prepare("INSERT INTO cliente (nome, sexo, cpf) VALUES (:nome, :sexo, :cpf)");
    $register->bindParam(':nome', $nome);
    $register->bindParam(':sexo', $sexo);
    $register->bindParam(':cpf', $cpf);
    $register->execute();

    header('Location: dashboard.php?page=cliente');
    exit; 
}


if ( isset($_POST['sercad'])) {
    $conn = connection();
    $servico = $_POST['sercad'];
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
    $register = $conn->prepare("INSERT INTO servico (servico) VALUES (:servico)");
    $register->bindParam(':servico', $servico);
    $register->execute();

    header('Location: dashboard.php?page=servico');
    exit; 
}