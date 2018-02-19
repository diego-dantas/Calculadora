<?php
    session_start();
    require_once '../dto/Calc.php';
    require_once '../entity/historicoEntity.php';
    $calc = new Calc();
    
    $idUser = $_SESSION['id'];
    $result = 0;
    $historico = false;

    $v1 = $_POST['vl1'];
    $v2 = $_POST['vl2'];
    $op = $_POST['opc'];
    
    
    switch($op){
        case'+': 
            $result = $calc->soma($v1, $v2);
            $historico = createHistorico('SOMA', $idUser);
            break;
        case'-': 
            $result = $calc->subtracao($v1, $v2);
            $historico = createHistorico('SUBTRAÇÃO', $idUser);
            break;
        case'x': 
            $result = $calc->multi($v1, $v2);
            $historico = createHistorico('MULTIPLICAÇÃO', $idUser);
            break;
        case'/': 
            $result = $calc->divisao($v1, $v2);
            $historico = createHistorico('DIVISÃO', $idUser);
            break;
        default: $result = 0;
            break;
    }
    
    $return['result'] = $result;
    $return['op']     = $op;
    $return['hist']   = $historico;
    
    echo json_encode($return);

?>



