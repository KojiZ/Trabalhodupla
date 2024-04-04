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
<div class="container text-center" style="margin-top:15%;">
    <div class="card mx-auto" style="width: 50%; height: 440px;border-color:green">
        <h5 class="card-header text-success">LOGIN</h5>
        <div class="card-body">
            <form action="#">
                <br>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">EMAIL:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Digite o seu email">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="senha" class="col-sm-2 col-form-label">SENHA:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a sua senha">
                    </div>
                </div>
                <div class="alert alert-primary d-noe" role="alert" name="alert" id="alert">
                    A simple primary alert—check it out!
                </div>
                <br>
                <button type="submit" class="btn btn-outline-success">LOGAR</button>
            </form>
        </div>
    </div>
</div>





    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>