<?php

    function connection(){

        try{
            $pdo = new PDO("mysql:host=localhost;dbname=calculadora_db", "root", "");    
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        return $pdo;
    }
    
?>