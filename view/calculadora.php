<?php 
    session_start();
    if(!isset($_SESSION["login"]) && !isset($_SESSION["name"])) {
        include 'acesso.php';        
        exit;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Web Calc</title>

        <link rel="stylesheet" href="static/css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="static/js/valida.js"></script>
    </head>
    <body>
        <header>
            <nav id="logo" class="navbar navbar-dark bg-dark">
                <a class="navbar-brand" href="../index.php">
                    <div class="row">
                        <img src="static/img/calc.png" alt="">
                        <p>Web Calc | Calculadora</p>
                    </div>    
                </a>
                <div class="form-inline">
                    <p class="userLogin">Usuário: <?php echo $_SESSION['name'];?></p>
                    <a href="relatorio.php">
                        <button type="button" class="btn btn-outline-primary">Relatório</button>
                    </a>
                    <a href="../index.php?logout">
                        <button type="button" class="btn btn-outline-primary">Logout</button>
                    </a>
                </div>
            </nav>
            <div id="boxCalc" class="col-md-6">

                <div class="form-group">
                    <input type="text" class="form-control" id="conta">
                </div>
                <div class="form-group">
                    <button type="button" id="btnLimpar" class="btn btn-outline-secondary btn-block" onClick='limpaCampo()'>Limpar</button>
                </div>
                <div class="form-group btnCalc">
                    <button type="button" id="btn7" class="btn btn-outline-primary" onClick="btnClick(7)">7</button>
                    <button type="button" id="btn8" class="btn btn-outline-primary" onClick="btnClick(8)">8</button>
                    <button type="button" id="btn9" class="btn btn-outline-primary" onClick="btnClick(9)">9</button>
                    <button type="button" id="btnMais" class="btn btn-outline-primary" onClick="btnClick('+')">+</button>
                </div>
                <div class="form-group  btnCalc">
                    <button type="button" id="btn4" class="btn btn-outline-primary" onClick="btnClick(4)">4</button>
                    <button type="button" id="btn5" class="btn btn-outline-primary" onClick="btnClick(5)">5</button>
                    <button type="button" id="btn6" class="btn btn-outline-primary" onClick="btnClick(6)">6</button>
                    <button type="button" id="btnMenos" class="btn btn-outline-primary" onClick="btnClick('-')">-</button>
                </div>
                <div class="roform-group btnCalc">
                    <button type="button" id="btn1" class="btn btn-outline-primary" onClick="btnClick(1)">1</button>
                    <button type="button" id="btn2" class="btn btn-outline-primary" onClick="btnClick(2)">2</button>
                    <button type="button" id="btn3" class="btn btn-outline-primary" onClick="btnClick(3)">3</button>
                    <button type="button" id="btnMult" class="btn btn-outline-primary" onClick="btnClick('x')">x</button>
                </div>
                <div class="form-group  btnCalc">
                    <button type="button" id="btn0" class="btn btn-outline-primary" onClick="btnClick(0)">0</button>
                    <button type="button" id="btnPont" class="btn btn-outline-primary" onClick="btnClick('.')">.</button>
                    <button type="button" id="btn00" class="btn btn-outline-primary" onClick="btnClick('00')">00</button>
                    <button type="button" id="btnDivide" class="btn btn-outline-primary" onClick="btnClick('/')">&divide;</button>
                </div>
                <div class="form-group">
                    <button type="button" id="salvar" class="btn btn-outline-success btn-block" onClick="btnClick('=')">=</button>
                </div>
            </div>
        </header>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="http://code.jquery.com/jquery-3.3.1.js"  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
      
    </body>
</html>