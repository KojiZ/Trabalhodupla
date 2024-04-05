<?php
include_once('config/connection.php');
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
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $conn = connection();

          $select = $conn->prepare("SELECT re.idregistros, c.nome AS nomeCliente, se.servico, re.prazoEntrega, re.valorContratado, re.valorEntrada, fo.formapagamento, a.nome AS nomeAdm, re.ativo
          FROM registros re
          JOIN cliente c ON re.idcliente = c.idcliente
          JOIN servico se ON re.idservico = se.idservico
          JOIN formapagamento fo ON re.idformapagamento = fo.idformapagamento
          JOIN adm a ON re.idadm = a.idadm
          ORDER BY re.idregistros;");
          $conn->beginTransaction();
          $select->execute();
          $conn->commit();
          foreach ($select as $table) {
            $id = $table['idregistros'];
            $nomeC = $table['nomeCliente'];
            $servico = $table['servico'];
            $prazoEntrega = $table['prazoEntrega'];
            $valorContratado = $table['valorContratado'];
            $valorEntrada = $table['valorEntrada'];
            $formapagamento = $table['formapagamento'];
            $nomeA = $table['nomeAdm'];
            $ativo = $table['ativo'];
          ?>
            <tr>
              <th scope="row"><?php echo $id ?></th>
              <td><?php echo $nomeC ?></td>
              <td><?php echo $servico ?></td>
              <td><?php echo $prazoEntrega ?></td>
              <td><b>R$ </b><?php echo $valorContratado ?></td>
              <td><b>R$ </b><?php echo $valorEntrada ?></td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                  <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#seemorereg<?php echo $id ?>">Ver+</button>
                  <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delreg<?php echo $id ?>">Excluir</button>
                </div>
              </td>
            </tr>

            <!-- Modal Ver+ registro -->
            <div class="modal fade" id="seemorereg<?php echo $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Ver Mais</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p><b>#: </b><?php echo $id ?></p>
                    <p><b>CLIENTE: </b><?php echo $nomeC ?></p>
                    <p><b>SERVIÇO: </b><?php echo $servico ?></p>
                    <p><b>PRAZO DE ENTREGA: </b><?php echo $prazoEntrega ?></p>
                    <p><b>VALOR DO CONTRATO: R$ </b><?php echo $valorContratado ?></p>
                    <p><b>VALOR DE ENTRADA: R$ </b><?php echo $valorEntrada ?></p>
                    <p><b>VALOR RESTANTE: R$ </b><?php echo ($valorContratado - $valorEntrada) ?></p>
                    <p><b>FORMA DE PAGAMENTO: </b><?php echo $formapagamento ?></p>
                    <p><b>QUEM GERENCIOU O CONTRATO: </b><?php echo $nomeA ?></p>
                    <p><b>STATUS DO CONTRATO: </b><?php if ($ativo == 'A') {
                                                    echo 'Ativado';
                                                  } else {
                                                    echo 'Desativado';
                                                  } ?></p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal Excluir registro -->
            <div class="modal fade" id="delreg<?php echo $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header bg-danger">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir Registros</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body text-danger">
                    <p>Você tem certeza que deseja excluir o registro "<?php echo $id ?>"?!</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <a href="delete.php?idregistro=<?php echo $id ?>" class="btn btn-danger">Excluir</a>
                  </div>
                </div>
              </div>
            </div>

          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>