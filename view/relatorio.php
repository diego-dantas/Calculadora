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
        <title>Web Calc | Relatório</title>

        <link rel="stylesheet" href="static/css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="http://code.jquery.com/jquery-3.3.1.js"  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="static/js/valida.js"></script>
    </head>
    <body>
        <header>
            <nav id="logo" class="navbar navbar-dark bg-dark">
                <a class="navbar-brand" href="../index.php">
                    <div class="row">
                        <img src="static/img/calc.png" alt="">
                        <p>Web Calc | Relatório</p>
                    </div>    
                </a>
                <div class="form-inline">
                    <p class="userLogin">Usuário: <?php echo $_SESSION['name'];?></p>
                    <a href="calculadora.php">
                        <button type="button" class="btn btn-outline-primary">Calculadora</button>
                    </a>
                    <a href="../index.php?logout">
                        <button type="button" class="btn btn-outline-primary">Logout</button>
                    </a>
                </div>
            </nav>
        </header>

        <div id="boxRel" class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Relatório de operações</h3>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="dtIni">De: </label>
                        <input type="date" class="form-control" id="dtIni">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="dtFin">Até: </label>
                        <input type="date" class="form-control" id="dtFin">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="responSelect">Responsável</label>
                        <select class="form-control" id="responSelect">
                            <option value="0">Todos</option>
                            <script>
                                
                                $.ajax({
                                    url: '../model/entity/usuarioEntity.php',
                                    type:'POST',
                                    dataType: 'json',
                                    data: {op: 'getResp'},
                                    success: function(data){
                                        var opt = '';
                                        for(var i in data){
                                            opt += '<option value='+data[i].id+'>'+data[i].nome+'</option>';
                                        }
                                        
                                        $("#responSelect").append(opt);

                                    },
                                    error: function(){
                                        console.log('Erro ao carregar a lista');
                                    }
                                });

                            </script>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-outline-primary" onClick="gerar()">Gerar</button>
                    </div>
                </div>
                <div class="row">
                    <table id="tableRel" class="table table-striped" style="display:none;"> 
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Data</th>
                            <th scope="col">Operação</th>
                            <th scope="col">Responsável</th>
                            </tr>
                        </thead>
                        <tbody id="bodyTable">
                            
                        </tbody>
                    </table>
                </div>
              
            </div>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="http://code.jquery.com/jquery-3.3.1.js"  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    </body>
</html>