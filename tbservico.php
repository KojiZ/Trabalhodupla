<?php
include_once('config/connection.php');
?>
<br>
<br>

<div class="container">
  <div class="card" style="border: 0;">
    <div class="card-header bg-success text-white">
      Serviços
    </div>
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Serviço</th>
            <th scope="col">Status</th>
            <th scope="col">Ações</th>
            <th scope="col"><button class="btn btn-outline-dark " data-bs-toggle="modal" data-bs-target="#cadservi">Cadastrar</button></th>
          </tr>
        </thead>
        <tbody>

          <?php
          $conn = connection();

          $select = $conn->prepare("SELECT idservico, servico, ativo FROM servico");
          $conn->beginTransaction();
          $select->execute();
          $conn->commit();
          foreach ($select as $table) {
            $idservico = $table['idservico'];
            $servico = $table['servico'];
            $ativo = $table['ativo'];

          ?>

            <tr>
              <th scope="row" style="width:5%"><?php echo $idservico ?></th>
              <td style="width:20%"><?php echo $servico ?></td>
              <td style="width:15%"><?php echo $ativo ?></td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                  <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#seemoreser<?php echo $idservico ?>">Ver+</button>
                  <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#altser<?php echo $idservico ?>">Alterar</button>
                  <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delser<?php echo $idservico ?>">Excluir</button>
                </div>

                <!-- Modal Ver+ Serviço -->
                <div class="modal fade" id="seemoreser<?php echo $idservico ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="exampleModalLabel">Ver Mais</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <p><b>ID:</b> <?php echo $idservico ?></p>
                        <p><b>SERVIÇO:</b> <?php echo $servico ?></p>
                        <p><b>STATUS:</b> <?php echo $ativo ?></p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Modal Editar Serviço -->
                <div class="modal fade" id="altser<?php echo $idservico ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form action="update.php" method="post">
                        <div class="modal-header bg-warning text-white">
                          <h5 class="modal-title" id="exampleModalLabel">Editar Serviço</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <input type="hidden" name="idservicoalt" value="<?php echo $idservico ?>">
                          <div class="mb-3">
                            <label for="servicoedit" class="form-label">Serviço:</label>
                            <input type="text" class="form-control" id="servicoedit" name="servicoedit" value="<?php echo $servico ?>">
                          </div>
                          <div class="mb-3">
                          <label for="ativoaltser" class="form-label">Ativo:</label>
                          <select class="form-select" id="ativoaltser" name="ativoaltser">
                            <option value="A" <?php if ($ativo == 1) echo "selected" ?>>Sim</option>
                            <option value="D" <?php if ($ativo == 0) echo "selected" ?>>Não</option>
                          </select>
                        </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-warning">Editar</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <!-- Modal Excluir Serviço -->
                <div class="modal fade" id="delser<?php echo $idservico ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header bg-danger text-white">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir Serviço</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body text-danger">
                        <p>Você tem certeza que deseja excluir o Serviço "<?php echo $servico ?>"?!</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <a href="delete.php?idservico=<?php echo $idservico ?>" class="btn btn-danger">Excluir</a>
                      </div>
                    </div>
                  </div>
                </div>

              <?php
            }
              ?>
              </td>
            </tr>

            <!-- Modal CADASTRAR cliente -->
            <div class="modal fade" id="cadservi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action="cadastro.php" method="post">
                    <div class="modal-header bg-success text-white">
                      <h5 class="modal-title" id="exampleModalLabel">Cadastrar cliente</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="sercad" class="form-label">Serviço:</label>
                        <input type="text" class="form-control" id="sercad" name="sercad" placeholder="Informe o nome do serviço">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Cadastrar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>