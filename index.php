<?php

    if(isset($_GET['logout'])){
        session_start();
        unset ($_SESSION['login']);
        unset ($_SESSION['name']);
    }
    


?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>

        <link rel="stylesheet" href="view/static/css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    
    </head>
    <body>
        <header>
            <nav id="logo" class="navbar navbar-dark bg-dark">
                <a class="navbar-brand" href="index.php">
                    <div class="row">
                        <img src="view/static/img/calc.png" alt="">
                        <p>Web Calc | Home</p>
                    </div>    
                </a>
                <div class="form-inline">
                    <a href="index.php">
                        <button type="button" class="btn btn-outline-primary">Login</button>
                    </a>
                    <a href="view/cadastrar.php">
                        <button type="button" class="btn btn-outline-primary">Cadastrar</button>
                    </a>
                </div>
            </nav>
        </header>
        <div class="container">
            <div class="row">
                <div id="box" class="col-md-6">
                    <h3>Login</h3><hr>
                    <div id="alertLogin" class="alert alert-danger" role="alert" style="display:none;">
                        Usuário ou Senha incorreto
                    </div>
                    <form>
                        <div class="form-group">
                            <label for="login">Login</label>
                            <input type="email" class="form-control" id="loginL" placeholder="Login">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Senha</label>
                            <input type="password" class="form-control" id="senhaL" placeholder="Senha">
                        </div>
                        <div class="from-group">
                            <button type="button" id="salvar" class="btn btn-outline-primary btn-block" onClick='login()'>Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="http://code.jquery.com/jquery-3.3.1.js"  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="view/static/js/valida.js"></script>
    </body>
</html>