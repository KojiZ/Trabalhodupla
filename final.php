<?php
session_start();
include_once('config/connection.php');

$conn = connection();

if (isset($_SESSION['idcliente'])) {
    $idcliente = $_SESSION['idcliente'];

    $select = $conn->prepare("SELECT idcliente, nome FROM cliente WHERE idcliente = :idcliente;");
    $select->bindParam(":idcliente", $idcliente);
    $select->execute();
    if ($select->rowCount() > 0) {
        $table = $select->fetch();
        $_SESSION['idcliente'] = $table['nome'];
    } else {
        unset($_SESSION['idcliente']);
    }
}

if (isset($_SESSION['idservico'])) {
    $idservico = $_SESSION['idservico'];

    $select = $conn->prepare("SELECT idservico, servico FROM servico WHERE idservico = :idservico;");
    $select->bindParam(":idservico", $idservico);
    $select->execute();
    if ($select->rowCount() > 0) {
        $table = $select->fetch();
        $_SESSION['idservico'] = $table['servico'];
    } else {
        unset($_SESSION['idservico']);
    }
}

if (isset($_SESSION['idadm'])) {
    $idservico = $_SESSION['idadm'];

    $select = $conn->prepare("SELECT idadm, nome FROM adm WHERE idadm = :idadm;");
    $select->bindParam(":idadm", $idadm);
    $select->execute();
    if ($select->rowCount() > 0) {
        $table = $select->fetch();
        $_SESSION['idadm'] = $table['nome'];
    } else {
        unset($_SESSION['idadm']);
    }
}
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
</head>

<body style="background-image: url('./img/2_afcas12.jpg');background-size: cover; ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-11"></div>
            <div class="col-1 mt-3"><a href="escolha.php" class="btn btn-danger">SAIR</a></div>
        </div>
    </div>
    <div class="container">
        <div class="card mt-5">
            <center>
                <div class="card-header">
                    Informações de compra
                </div>
            </center>
            <div class="card-body">
                <?php if (isset($_SESSION['idcliente'])) : ?>
                    <p><b>Cliente:</b> <?php echo $_SESSION['idcliente']; ?></p>
                <?php endif; ?>
                <?php if (isset($_SESSION['idservico'])) : ?>
                    <p><b>Serviço:</b> <?php echo $_SESSION['idservico']; ?></p>
                <?php endif; ?>
                <?php if (isset($_SESSION['prazoEntrega'])) : ?>
                    <p><b>Prazo de Entrega:</b> <?php echo $_SESSION['prazoEntrega']; ?></p>
                <?php endif; ?>
                <?php if (isset($_SESSION['valorEntrada'])) : ?>
                    <p><b>Valor de Entrada:</b> R$ <?php echo $_SESSION['valorEntrada']; ?></p>
                <?php endif; ?>
                <?php if (isset($_SESSION['valorContratado']) && isset($_SESSION['valorEntrada'])) : ?>
                    <p><b>Valor Restante:</b> R$ <?php echo ($_SESSION['valorContratado'] - $_SESSION['valorEntrada']); ?></p>
                <?php endif; ?>
                <?php if (isset($_SESSION['valorContratado'])) : ?>
                    <p><b>Valor Total:</b> R$ <?php echo $_SESSION['valorContratado']; ?></p>
                <?php endif; ?>
                <?php if (isset($_SESSION['pagamentoselec'])) : ?>
                    <p><b>Tipo de Pagamento:</b> <?php echo ($_SESSION['pagamentoselec'] == '1') ? 'Á Vista' : 'Á Prazo'; ?></p>
                <?php endif; ?>
                <?php if (isset($_SESSION['idadm'])) : ?>
                    <p><b>Quem Recebeu o Pagamento:</b> <?php echo $_SESSION['idadm']; ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>
