<?php
include_once('config/connection.php');
?>
<br>
<br>

<div class="container">
  <div class="card" style="border: 0;">
    <div class="card-header bg-success text-white">
      Cliente
    </div>
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Sexo</th>
            <th scope="col">CPF</th>
            <th scope="col">Status</th>
            <th scope="col">Ações</th>
            <th scope="col"><button class="btn btn-outline-dark " data-bs-toggle="modal" data-bs-target="#cadcli">Cadastrar</button></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $conn = connection();

          $select = $conn->prepare("SELECT idcliente, nome, sexo, cpf, ativo FROM cliente");
          $conn->beginTransaction();
          $select->execute();
          $conn->commit();
          foreach ($select as $table) {
            $idcliente = $table['idcliente'];
            $nomeC = $table['nome'];
            $sexo = $table['sexo'];
            $cpf = $table['cpf'];
            $ativo = $table['ativo'];

          ?>

            <tr>
              <th scope="row" style="width:5%"><?php echo $idcliente ?></th>
              <td style="width:20%"><?php echo $nomeC ?></td>
              <td style="width:15%"><?php echo $sexo ?></td>
              <td style="width:20%"><?php echo $cpf ?></td>
              <td style="width:20%"><?php echo $ativo ?></td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                  <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#seemorecli<?php echo $idcliente ?>">Ver+</button>
                  <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editarcli<?php echo $idcliente ?>">Alterar</button>
                  <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delcli<?php echo $idcliente ?>">Excluir</button>
                </div>
              </td>

              <!-- Modal Ver+ Cliente -->
              <div class="modal fade" id="seemorecli<?php echo $idcliente ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                      <h5 class="modal-title" id="exampleModalLabel">Ver Mais</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p><b>ID:</b> <?php echo $idcliente ?></p>
                      <p><b>NOME:</b> <?php echo $nomeC ?></p>
                      <p><b>SEXO:</b> <?php echo $sexo ?></p>
                      <p><b>CPF:</b> <?php echo $cpf ?></p>
                      <p><b>STATUS:</b> <?php echo $ativo ?></p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Modal Editar Cliente -->
              <div class="modal fade" id="editarcli<?php echo $idcliente ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form action="update.php" method="post">
                      <div class="modal-header bg-warning text-white">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <input type="hidden" name="idclientealt" value="<?php echo $idcliente ?>">
                        <div class="mb-3">
                          <label for="nomeeditcli" class="form-label">Nome:</label>
                          <input type="text" class="form-control" id="nomeeditcli" name="nomeeditcli" value="<?php echo $nomeC ?>">
                        </div>
                        <label for="sexoeditcli" class="form-label">Sexo:</label>
                        <select class="form-select form-select-lg mb-3" aria-label="Large select example" id="sexoeditcli" name="sexoeditcli">
                          <option value="Masculino" <?php if ($sexo == "Masculino") echo "selected" ?>>Masculino</option>
                          <option value="Feminino" <?php if ($sexo == "Feminino") echo "selected" ?>>Feminino</option>
                          <option value="Neutro" <?php if ($sexo == "Neutro") echo "selected" ?>>Neutro</option>
                        </select>
                        <div class="mb-3">
                          <label for="cpfeditcli" class="form-label">CPF:</label>
                          <input type="text" class="form-control cpf" id="cpfeditcli<?php echo $idcliente ?>" name="cpfeditcli" maxlength="14" value="<?php echo $cpf ?>">
                        </div>
                        <div class="mb-3">
                          <label for="ativoaltcli" class="form-label">Ativo:</label>
                          <select class="form-select" id="ativoaltcli" name="ativoaltcli">
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

              <!-- Modal Excluir registro -->
              <div class="modal fade" id="delcli<?php echo $idcliente ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir Registros</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-danger">
                      <p>Você tem certeza que deseja excluir o Cliente "<?php echo $nomeC ?>"?!</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                      <a href="delete.php?idcliente=<?php echo $idcliente ?>" class="btn btn-danger">Excluir</a>
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
            <div class="modal fade" id="cadcli" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action="cadastro.php" method="post">
                    <div class="modal-header bg-success text-white">
                      <h5 class="modal-title" id="exampleModalLabel">Cadastrar cliente</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="nomecadcli" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="nomecadcli" name="nomecadcli" placeholder="Informe o seu nome">
                      </div>
                      <label for="sexocadcli" class="form-label">Sexo:</label>
                      <select class="form-select form-select-lg mb-3" aria-label="Large select example" id="sexocadcli" name="sexocadcli">
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Neutro">Neutro</option>
                      </select>
                      <div class="mb-3">
                        <label for="cpfcadcli" class="form-label">CPF:</label>
                        <input type="text" class="form-control" id="cpfcadcli" name="cpfcadcli" placeholder="Informe o seu CPF" maxlength="14">
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

            <script>
              document.getElementById('cpfcadcli').addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                value = value.replace(/(\d{3})(\d)/, '$1.$2');
                value = value.replace(/(\d{3})(\d)/, '$1.$2');
                value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
                e.target.value = value;
              });
            </script>
            <script>
              document.getElementById('cpfeditcli<?php echo $idcliente ?>').addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                value = value.replace(/(\d{3})(\d)/, '$1.$2');
                value = value.replace(/(\d{3})(\d)/, '$1.$2');
                value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
                e.target.value = value;
              });
            </script>