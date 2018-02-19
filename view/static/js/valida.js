

//metodo para validação de login
function login(){
    
    var login = document.getElementById('loginL').value;
    var senha = document.getElementById('senhaL').value;
    var valid = true;
    if(login === '' || login === null){
        alert('O campo login está vazio!');
        document.getElementById('loginL').focus();
        valid = false;
    }
       
    if(senha === '' || senha === null){
        alert('O campo senha está vazio!');
        document.getElementById('senhaL').focus();
        valid = false;
    }
    if(valid){

        $.ajax({
            url: 'model/entity/usuarioEntity.php',
            type: 'post',
            dataType: 'json',
            data: {
                user: login,
                pass: senha,
                op: 'login'
            },
            success: function(data){
                console.log(data);
                if(data.login){
                    $(location).attr('href', 'view/calculadora.php');
                }else{
                    $("#alertLogin").css("display", "block");
                }
               
            },
            error: function(){
                console.log('Erro ao validar usuario');
            }
        })
        console.log(login +' ' + senha);
    }
    
}


//Metodo para criação de usuarios
function createUser(){
    var nome = document.getElementById('nomeC').value;
    var login = document.getElementById('loginC').value;
    var senha = document.getElementById('senhaC').value;
    var valid = true;
    
    if(nome === '' || nome === null){
        alert('O campo nome está vazio!');
        document.getElementById('nomeC').focus();
        valid = false;
    }
    
    if(login === '' || login === null){
        alert('O campo login está vazio!');
        document.getElementById('loginC').focus();
        valid = false;
    }
       
    if(senha === '' || senha === null){
        alert('O campo senha está vazio!');
        document.getElementById('senhaC').focus();
        valid = false;
    }
    if(valid){
        $.ajax({
            url: '../model/entity/usuarioEntity.php',
            type: 'post',
            dataType: 'json',
            data: {
                name: nome,   
                user: login,
                pass: senha,
                op: 'create'
            },
            success: function(data){
                
                if(data.create){
                    $(location).attr('href', 'calculadora.php');
                }           
            },
            error: function(){
                console.log('Erro ao validar usuario');
            }
       })
    }
}


//Metodo para geração de relatórios
function gerar(){
    var de     = document.getElementById('dtIni').value;
    var ate    = document.getElementById('dtFin').value;
    var id = document.getElementById('responSelect').value;
    var valid = true;
    console.log(de +' '+ ate + ' ' + id);

    if(de === '' || de === null){
        alert('O campo data Inicio está vazio!');
        document.getElementById('dtIni').focus();
        valid = false;
    }
    
    if(ate === '' || ate === null){
        alert('O campo data Fim está vazio!');
        document.getElementById('dtFin').focus();
        valid = false;
    }

    if(valid){
        $.ajax({
            url: '../model/entity/relatorioEntity.php',
            type: 'post',
            dataType: 'json',
            data: {
                dataI: de,   
                dataF: ate,
                idUser: id
            },
            success: function(data){
                $(".rowRel").remove();

                var htmlTable = '';
                for(var i in data){
                    htmlTable += '<tr class="rowRel">' +
                                    '<th scope="row">'+data[i].id+'</th>' +
                                    '<td>'+data[i].data+'</td>' +
                                    '<td>'+data[i].operacao+'</td>' +
                                    '<td>'+data[i].nome+'</td>' +
                                '</tr>'
                }
                $("#tableRel").css("display", "block");
                $("#bodyTable").append(htmlTable);

            },
            error: function(){
                console.log('Erro ao gerar o relatório');
            }
       })
    }
}


//metodo para capturar os clicks da calculadora
function btnClick(op){
    var valor = op;
    var vl = document.getElementById('conta').value;
    if(valor === '='){
        calcResult();
    }else{

        if(valor >= 0 && valor <= 9 || valor ===   '.'){
            document.getElementById('conta').value = vl + '' + valor;
        }else{
            document.getElementById('conta').value = vl + ' ' + valor + ' ';
        }
    }

   
}


//metodo para realizar o calculo 
function calcResult(){
    var vl = document.getElementById('conta').value;
    var vSplit = vl.split(' ');
    
    var v1 = vSplit[0];
    var v2 = vSplit[2];
    var op = vSplit[1];
    
    console.log(v1 + ' ' + op + ' ' + v2);

    $.ajax({
        url: '../model/service/makeBill.php',
        type: 'post',
        dataType: 'json',
        data: {
            vl1: v1,
            vl2: v2,
            opc: op
        },
        success: function(data){
            console.log(data);

            document.getElementById('conta').value = data.result;
        },
        error: function(){
            console.log('Erro ao validar usuario');
        }
    })
    

}

//metodo para limpar o campo
function limpaCampo(){
    document.getElementById('conta').value = ''; 
}
