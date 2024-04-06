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
    <script src="./js/script.js" defer></script>

</head>

<body style="background-image: url('./img/Designsemnome.png');background-size: cover; ">
    <div id="tobias" class="fixed-top"></div>
    <div class="container text-center" style="margin-top:15%;">
        <div class="card mx-auto" style="width: 50%; height: 450px;border-color:green">
            <h5 class="card-header text-success">LOGIN</h5>
            <div class="card-body">
                <form action="login.php" method="POST">
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
                    <button type="button" class="btn btn-outline-success" onclick="login()">LOGAR</button>
                    <br>
                    <br>
                    <div class="alert alert-light" role="alert" name="log" id="log" style="display: none">
                        Bundinha
                    </div>
                </form>
            </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>