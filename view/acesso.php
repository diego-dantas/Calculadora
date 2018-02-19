<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>

        <link rel="stylesheet" href="static/css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    
    </head>
    <body>
        <header>
            <nav id="logo" class="navbar navbar-dark bg-dark">
                <a class="navbar-brand" href="../index.php">
                    <div class="row">
                        <img src="static/img/calc.png" alt="">
                        <p>Web Calc | Acesso Negado</p>
                    </div>    
                </a>
                <div class="form-inline">
                    <a href="../index.php">
                        <button type="button" class="btn btn-outline-primary">Login</button>
                    </a>
                    <a href="../view/cadastrar.php">
                        <button type="button" class="btn btn-outline-primary">Cadastrar</button>
                    </a>
                </div>
            </nav>
        </header>
        <div class="container">
            <div id="boxAccess"class="row">
                <div class="col-md-12">
                    <img src="static/img/Stop.png" alt="">
                <div>
                <div class="col-md-12">
                    <div id="alertLogin" class="alert alert-danger" role="alert">
                        <h1>Acesso Negado</h1>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>