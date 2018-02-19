<?php

class Calc{

    private $equacao;
    private $operacao;

    function __constructor(){

    }

    public function getEquacao(){
        return $this->equacao;
    }

    public function setEquacao($e){
        $this->equacao = $e;
    }

    public function getOperacao(){
        return $this->operacao;
    }

    public function setOperacao($o){
        $this->operacao = $o;
    }


    public function soma($v1, $v2){
        return ($v1 + $v2);
    }

    public function subtracao($v1, $v2){
        return ($v1 - $v2);
    }

    public function multi($v1, $v2){
        return ($v1 * $v2);
    }

    public function divisao($v1, $v2){
        if($v2 != 0){
            return ($v1 / $v2);
        }else {
            return 'Divisão por zero não permitida';
        }
    }

    public function raiz($v){
        
    }

}

?>