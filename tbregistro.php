<?php

?>
<br>
<br>

<div class="container">
  <div class="card" style="border: 0;">
    <div class="card-header bg-success text-white">
      Registros
    </div>
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Cliente</th>
            <th scope="col">Serviço</th>
            <th scope="col">Prazo de Entrega</th>
            <th scope="col">Valor Contratado</th>
            <th scope="col">Valor de Entrada</th>
            <th scope="col">Tipo de Pagamento</th>
            <th scope="col">Recebidor</th>
            <th scope="col">Ações</th>
            <th scope="col"><button class="btn btn-outline-dark " data-bs-toggle="modal" data-bs-target="#cadastrarcarro">Cadastrar</button></th>
          </tr>
        </thead>
        <tbody>
         

            <tr>
              <th scope="row" style="width:5%"><?php   ?></th>
              <td style="width:20%"><?php   ?></td>
              <td style="width:15%"><?php   ?></td>
              <td style="width:40%"><?php   ?></td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                  <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#seemore<?php ?>">Ver+</button>
                  <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#V<?php ?>">Alterar</button>
                  <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delcar<?php  ?>">Excluir</button>
                </div>
              </td>
            </tr>