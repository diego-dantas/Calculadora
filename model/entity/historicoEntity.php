<?php

    require_once '../db/Connection.php';

    function createHistorico($op, $user){
       
        $pdo = connection();
        
        $historico = $pdo->prepare("insert into historicos(data, operacao, idUsuario) values(curdate(), :o, :i)");
        $historico->bindValue(":o", $op);
        $historico->bindValue(":i", $user);
        $historico->execute();

       if($historico->rowCount() > 0){
           return true; 
        }else{
            return false;         
        } 

    }

?>