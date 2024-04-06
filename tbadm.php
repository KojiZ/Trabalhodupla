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
            <th scope="col">Status</th>
            <th scope="col">Ações</th>
            <th scope="col"><button class="btn btn-outline-dark " data-bs-toggle="modal" data-bs-target="#cadadm">Cadastrar</button></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $conn = connection();
          $select = $conn->prepare("SELECT idadm, nome, email, ativo FROM adm");
          $select->execute();
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
                  <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#seemoreadm<?php echo $idadm ?>">Ver+</button>
                  <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#alteraradm<?php echo $idadm ?>">Alterar</button>
                  <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deladm<?php echo $idadm ?>">Excluir</button>
                </div>
              </td>
            </tr>

            <!-- Modal Ver+ Adm -->
            <div class="modal fade" id="seemoreadm<?php echo $idadm ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Ver Mais</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p><b>ID:</b> <?php echo $idadm ?></p>
                    <p><b>NOME:</b> <?php echo $nome ?></p>
                    <p><b>EMAIL:</b> <?php echo $email ?></p>
                    <p><b>STATUS:</b> <?php echo $ativo ?></p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal Alterar Adm -->
            <div class="modal fade" id="alteraradm<?php echo $idadm ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action="update.php" method="post">
                    <div class="modal-header bg-warning text-white">
                      <h5 class="modal-title" id="exampleModalLabel">Alterar Adm</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <input type="hidden" name="idadm" value="<?php echo $idadm ?>">
                      <div class="mb-3">
                        <label for="nomealtadm" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="nomealtadm" name="nomealtadm" value="<?php echo $nome ?>">
                      </div>
                      <div class="mb-3">
                        <label for="emailaltadm" class="form-label">Email:</label>
                        <input type="text" class="form-control" id="emailaltadm" name="emailaltadm" value="<?php echo $email ?>">
                      </div>
                      <div class="mb-3">
                        <label for="ativoaltadm" class="form-label">Ativo:</label>
                        <select class="form-select" id="ativoaltadm" name="ativoaltadm">
                          <option value="A" <?php if ($ativo == 1) echo "selected" ?>>Sim</option>
                          <option value="D" <?php if ($ativo == 0) echo "selected" ?>>Não</option>
                        </select>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-warning">Alterar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- Modal Excluir registro -->
            <div class="modal fade" id="deladm<?php echo $idadm ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header bg-danger text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir Registros</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body text-danger">
                    <p>Você tem certeza que deseja excluir o ADM "<?php echo $nome ?>"?!</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <a href="delete.php?idadm=<?php echo $idadm ?>" class="btn btn-danger">Excluir</a>
                  </div>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </tbody>
      </table>

      <!-- Modal CADASTRAR Adm -->
      <div class="modal fade" id="cadadm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="cadastro.php" method="post">
              <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="exampleModalLabel">Cadastrar Adm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label for="nomecadadm" class="form-label">Nome:</label>
                  <input type="text" class="form-control" id="nomecadadm" name="nomecadadm" placeholder="Informe o seu nome">
                </div>
                <div class="mb-3">
                  <label for="emailcadadm" class="form-label">EMAIL:</label>
                  <input type="text" class="form-control" id="emailcadadm" name="emailcadadm" placeholder="Informe o seu email">
                </div>
                <div class="mb-3">
                  <label for="senhacadadm" class="form-label">SENHA:</label>
                  <input type="password" class="form-control" id="senhacadadm" name="senhacadadm" placeholder="Informe a sua senha">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Cadastrar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>