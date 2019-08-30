<?php

class Conexao
{
    private $usuario = "root";
    private $senha = "";
    private $banco = "mysql:host=localhost:3306;dbname=estacionamento" ;

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