<?php
//para o servidor do 000webhost
class Conexao
{
    private $usuario = "id11439604_root2";
    private $senha = "igor21101998";
    private $banco = "mysql:host=localhost;dbname=id11439604_estacionamento" ;

    function conecta(){
        try{
            $con = new PDO($this->banco,$this->usuario,$this->senha);
            $con->query("set names utf8;");
            return $con;
        }catch(PDOException $exception) {
            echo $exception->getMessage();
        }
    }
}
