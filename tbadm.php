<?php 
include_once('config/connection.php');
?>
<br>
<br>

<div class="container">
  <div class="card" style="border: 0;">
    <div class="card-header bg-success text-white">
      Adm
    </div>
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Ativo</th>
            <th scope="col">Ações</th>
            <th scope="col"><button class="btn btn-outline-dark " data-bs-toggle="modal" data-bs-target="#cadastrarcarro">Cadastrar</button></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $conn = connection();
          $select = $conn->prepare("SELECT idadm, nome, email, ativo FROM adm");
          $conn->beginTransaction();
          $select->execute();
          $conn->commit();
          foreach ($select as $table) {
              $idadm = $table['idadm'];
              $nome = $table['nome'];
              $email = $table['email'];
              $ativo = $table['ativo'];
          
          ?>

            <tr>
              <th scope="row" style="width:5%"><?php echo $idadm ?></th>
              <td style="width:20%"><?php echo $nome ?></td>
              <td style="width:15%"><?php echo $email ?></td>
              <td style="width:40%"><?php echo $ativo ?></td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                  <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#seemoreadm<?php ?>">Ver+</button>
                  <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#alteraradm<?php ?>">Alterar</button>
                  <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deladm<?php  ?>">Excluir</button>
                </div>
                <?php
          }
                ?>
              </td>
            </tr>