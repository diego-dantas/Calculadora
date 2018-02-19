<?php

    session_start(); 

    function validSession(){
        if(!isset($_SESSION["login"]) && !isset($_SESSION["name"])) {
            return false;
        }
    }
    
?>