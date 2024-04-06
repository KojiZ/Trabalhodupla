<?php
include_once'config/connection.php';

$conn = connection();

if (isset($_POST['idadm'])) {
    $id = $_POST['idadm'];
    $nome = $_POST['nomealtadm'];
    $email = $_POST['emailaltadm'];
    $ativo = $_POST['ativoaltadm'];
    $update = "UPDATE adm SET nome = :nome, email = :email, ativo = :ativo WHERE idadm = :idadm";
    $stmt = $conn->prepare($update);
    $stmt->bindParam(':idadm', $id); 
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':ativo', $ativo);
    $stmt->execute(); 
    header('Location: dashboard.php?page=adm'); 
}


if (isset($_POST['idclientealt'])) {
    $id = $_POST['idclientealt'];
    $nome = $_POST['nomeeditcli'];
    $sexo = $_POST['sexoeditcli'];
    $cpf = $_POST['cpfeditcli'];
    $ativo = $_POST['ativoaltcli'];
    $update = "UPDATE cliente SET nome = :nome, sexo = :sexo, cpf = :cpf, ativo = :ativo WHERE idcliente = :idcliente";
    $stmt = $conn->prepare($update);
    $stmt->bindParam(':idcliente', $id); 
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':sexo', $sexo);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':ativo', $ativo);
    $stmt->execute(); 
    header('Location: dashboard.php?page=cliente'); 
}

if (isset($_POST['idservicoalt'])) {
    $id = $_POST['idservicoalt'];
    $servico = $_POST['servicoedit'];
    $ativo = $_POST['ativoaltser'];
    $update = "UPDATE servico SET servico = :servico, ativo = :ativo WHERE idservico = :idservico";
    $stmt = $conn->prepare($update);
    $stmt->bindParam(':idservico', $id); 
    $stmt->bindParam(':servico', $servico);
    $stmt->bindParam(':ativo', $ativo); 
    $stmt->execute(); 
    header('Location: dashboard.php?page=servico'); 
}
