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
        <div class="card " style="border-color:green">
            <center><div class="card-header bg-success text-white">
                Controle do Caixa
            </div></center>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 sm-1">
                    <label for="exampleFormControlInput1" class="form-label">CLIENTE</label>
                        <select class="form-select" aria-label="Default select example" required="required">
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-md-6 sm-1">
                    <label for="exampleFormControlInput1" class="form-label">SERVIÇO</label>
                        <select class="form-select" aria-label="Default select example" required="required">
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-md-6 sm-1 mt-5">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">PRAZO DE ENTREGA</label>
                            <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required="required">
                        </div>
                    </div>
                    <div class="col-md-6 sm-1 mt-5">
                            <label for="exampleFormControlInput1" class="form-label">VALOR DO CONTRATO</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="R$" required="required">
                    </div>
                    <div class="col-md-6 sm-1 mt-5">
                            <label for="exampleFormControlInput1" class="form-label">VALOR DE ENTRADA</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="R$" required="required">
                    </div>
                    <div class="col-md-6 sm-1 mt-5">
                    <label for="exampleFormControlInput1" class="form-label">FORMA DE PAGAMENTO</label>
                        <select class="form-select" aria-label="Default select example" required="required">
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-md-12 sm-1 mt-5">
                       <center><button type="submit" class="btn btn-success">CADASTRAR VENDA</button></center> 
                    </div>
                </div>
            </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>