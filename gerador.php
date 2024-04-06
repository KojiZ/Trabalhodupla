<?php
session_start();
include_once('config/connection.php');


$adm = $_SESSION['idadm'];

$conn = connection();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>FluxoDeCaixa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=League+Gothic&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicons/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
</head>

<body style="background-image: url('./img/Designsemnome.png');background-size: cover; ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-11"></div>
            <div class="col-1 mt-3"><a href="escolha.php" class="btn btn-danger">SAIR</a></div>
        </div>
    </div>

    <div class="container">
        <div class="card " style="border-color:green">
            <center>
                <div class="card-header bg-success text-white">
                    Controle do Caixa
                </div>
            </center>
            <form action="cadastro.php" method="post">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 sm-1">
                            <label for="clienteselec" class="form-label">CLIENTE</label>
                            <select class="form-select" aria-label="Default select example" required="required" id="clienteselec" name="clienteselec">
                                <?php
                                $conn = connection();

                                $select = $conn->prepare("SELECT idcliente, nome, sexo, cpf, ativo FROM cliente");
                                $conn->beginTransaction();
                                $select->execute();
                                $conn->commit();
                                foreach ($select as $table) {
                                    $idcliente = $table['idcliente'];
                                    $nomeC = $table['nome'];

                                ?>

                                    <option value="<?php echo $idcliente ?>"><?php echo $nomeC ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-6 sm-1">
                            <label for="servicoselec" class="form-label">SERVIÇO</label>
                            <select class="form-select" aria-label="Default select example" required="required" id="servicoselec" name="servicoselec">
                                <?php
                                $conn = connection();

                                $select = $conn->prepare("SELECT idservico, servico, ativo FROM servico");
                                $conn->beginTransaction();
                                $select->execute();
                                $conn->commit();
                                foreach ($select as $table) {
                                    $idservico = $table['idservico'];
                                    $servico = $table['servico'];

                                ?>

                                    <option value="<?php echo $idservico ?>"><?php echo $servico ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 sm-1 mt-5">
                            <div class="mb-3">
                                <label for="prazoEntrega" class="form-label">PRAZO DE ENTREGA</label>
                                <input type="date" class="form-control" id="prazoEntrega" name="prazoEntrega" required="required">
                            </div>
                        </div>
                        <input type="number" class="form-control d-none" id="idadmselec" name="idadmselec" value="<?php echo $adm;  ?>">
                        <div class="col-md-6 sm-1 mt-5">
                            <label for="contratoselec" class="form-label">VALOR DO CONTRATO</label>
                            <div class="input-group">
                                <span class="input-group-text">R$</span>
                                <input type="number" class="form-control" id="contratoselec" name="contratoselec" placeholder="0.00" required="required">
                            </div>
                        </div>
                        <div class="col-md-6 sm-1 mt-5">
                            <label for="entradaselec" class="form-label">VALOR DE ENTRADA</label>
                            <div class="input-group">
                                <span class="input-group-text">R$</span>
                                <input type="number" class="form-control" id="entradaselec" name="entradaselec" placeholder="0.00" required="required">
                            </div>
                        </div>
                        <div class="col-md-6 sm-1 mt-5">
                            <label for="pagamentoselec" class="form-label">FORMA DE PAGAMENTO</label>
                            <select class="form-select" aria-label="Default select example" required="required" id="pagamentoselec" name="pagamentoselec">
                                <?php
                                $conn = connection();

                                $select = $conn->prepare("SELECT idformapagamento, formaPagamento, ativo FROM formapagamento");
                                $conn->beginTransaction();
                                $select->execute();
                                $conn->commit();
                                foreach ($select as $table) {
                                    $idformapagamento = $table['idformapagamento'];
                                    $formaPagamento = $table['formaPagamento'];

                                ?>

                                    <option value="<?php echo $idformapagamento ?>"><?php echo $formaPagamento ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-12 sm-1 mt-5">
                            <center><button type="submit" class="btn btn-success">CADASTRAR VENDA</button></center>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>