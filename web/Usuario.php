<?php
/**
 * Created by PhpStorm.
USER IGOR
 */
require_once "Conexao.php";
#date_default_timezone_set('America/Porto_Velho');

class Usuario extends Conexao
{
    private $id;
    private $email;
    private $senha;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }


    public function inserir()
    {
        try {
            $con = $this->conecta();
            $sql = $con->prepare('insert into usuario(email,senha) values (?,?)');
            $sql->bindValue(1, $this->email);
            $sql->bindValue(2, $this->senha);
            $sql->execute();
            $con = null;
            return $this->id;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function atualizar()
    {
        try {
            $con = $this->conecta();
            $sql = $con->prepare("update usuario set email=?,senha=? where id=?");
            $sql->bindValue(1, $this->email);
            $sql->bindValue(2, $this->senha);
            $sql->bindValue(3, $this->id);
            $sql->execute();
            $con = null;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public static function seleciona($id)
    {
        try {
            $con = new Usuario();
            $con = $con->conecta();
            $sql = $con->prepare("select * from usuario where id = ?");
            $sql->bindValue(1, $id);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $sql = $sql->fetch();
                $temp = new Usuario();
                $temp->id = $sql[0];
                $temp->email = $sql[1];
                $temp->senha = $sql[2];
                $con = null;
                return $temp;
            } else {
                return null;
            }
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public static function login($emailU, $senhaU)
    {
        try {
            $con = (new Usuario())->conecta();
            $sql = $con->prepare("select id from usuario where email = ? and senha = ?");

            $sql->bindValue(1, $emailU);
            $sql->bindValue(2, $senhaU);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $sql = $sql->fetch();
                $con = null;
                return $sql[0];
            } else {
                $con = null;
                return null;
            }
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
} //fim da classe Usuário

