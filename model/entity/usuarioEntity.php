<?php 
    require_once '../db/Connection.php';
    session_start();
    
    // $nome    = $_POST['name'];
    // $usuario = $_POST['user'];
    // $senha   = $_POST['pass'];
    $op = $_POST['op'];

    if($op == 'login')   login($_POST['user'], $_POST['pass']);
    if($op == 'create')  createUser($_POST['name'], $_POST['user'], $_POST['pass']);    
    if($op == 'getResp') getResponsavel();
    
    //metodo para verificação de login
    function login($u, $s){
        $pdo = connection();
        $loginStatus['login'] = false;
        $login = $pdo->prepare("select * from usuarios u where u.usuario =:us and u.senha =:se"); 
        $login->bindValue(":us", $u);
        $login->bindValue(":se", $s);
        $login->execute();

        if($login->rowcount() > 0){
            $row = $login->fetch(PDO::FETCH_ASSOC);
            $loginStatus['login'] = true;
            $loginStatus['name']  = $row['nome'];
            $loginStatus['user']  = $row['usuario'];
            
            $_SESSION['id']    = $row['id'];
            $_SESSION['login'] = $row['usuario'];
            $_SESSION['name']  = $row['nome'];
        }else{
            unset ($_SESSION['login']);
            unset ($_SESSION['name']);

        }
        echo json_encode($loginStatus);
    }

    function createUser($n, $u, $s){
        $pdo = connection();

        $createStatus['create'] = false;

        $create = $pdo->prepare("insert into usuarios(nome, usuario, senha) values(:n, :u, :s)");
        $create->bindValue(":n", $n);
        $create->bindValue(":u", $u);
        $create->bindValue(":s", $s);
        $create->execute();

        if($create->rowCount() > 0){
            $createStatus['create'] = true;
            $loginStatus['name'] = $n;
            $loginStatus['user'] = $u;

            $_SESSION['login'] = $u;
            $_SESSION['name']  = $n;
        }else{
            unset ($_SESSION['login']);
            unset ($_SESSION['name']);

        }

        echo json_encode($createStatus);
    }


    function getResponsavel(){
        $pdo = connection();

        $getStatus['status'] = false;

        $getRespon = $pdo->prepare("select * from usuarios");
        $getRespon->execute();

        while($row = $getRespon->fetch(PDO::FETCH_ASSOC)){
            $listRespo[$row['id']]['id']   = $row['id'];
            $listRespo[$row['id']]['nome'] = $row['nome'];
        }

        echo json_encode($listRespo);
    }

?>