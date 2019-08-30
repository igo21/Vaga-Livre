<?php

require_once "Conexao.php";

class Vaga extends Conexao
{
    private $id;
    private $nome;
    private $latitude;
    private $longitude;
    private $disponivel;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return mixed
     */
    public function getDisponivel()
    {
        return $this->disponivel;
    }

    /**
     * @param mixed $disponivel
     */
    public function setDisponivel($disponivel)
    {
        $this->disponivel = $disponivel;
    }
    public function inserir()
    {
        try {
            $con = $this->conecta();
            $sql = $con->prepare('insert into vaga(nome,latitude,longitude,disponivel) values (?,?,?,?)');
            $sql->bindValue(1, $this->nome);
            $sql->bindValue(2, $this->latitude);
            $sql->bindValue(3, $this->longitude);
            $sql->bindValue(4, $this->disponivel);
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
            $sql = $con->prepare("update vaga set nome=?,latitude=?,longitude=?,disponivel=? where id=?");
            $sql->bindValue(1, $this->nome);
            $sql->bindValue(2, $this->latitude);
            $sql->bindValue(3, $this->longitude);
            $sql->bindValue(4, $this->disponivel);
            $sql->bindValue(5, $this->id);
            $sql->execute();
            $con = null;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public static function confereVaga($campo){
        try{
            $con = new Vaga();
            $con = $con->conecta();
            $sql = $con->prepare("select id from vaga where nome = ?");

            $sql->bindValue(1, $campo);//campo=nome.
            $sql->execute();
            $con = null;
            return $sql->rowCount();
        }catch (PDOException $e){
            return $e->getMessage();
        }
    }

    public static function listarVaga(){
        try{
            $con = new Vaga();
            $con = $con->conecta();
            $sql = $con->prepare("select id,nome,latitude,longitude,disponivel from vaga");
            $sql->execute();
            $con = null;
            return $sql->fetchAll();
        }catch (PDOException $e){
            return $e->getMessage();
        }
    }
    public function excluir(){
        try {
            $con = $this->conecta();
            $sql = $con->prepare("delete from vaga where id=?");
            $sql->bindValue(1, $this->id);
            $sql->execute();
            $con = null;
            return true;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public static function seleciona($id)
    {
        try {
            $con = new Vaga();
            $con = $con->conecta();
            $sql = $con->prepare("select id,nome,latitude,longitude,disponivel from vaga where id = ?");
            $sql->bindValue(1, $id);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $sql = $sql->fetch();
                $temp = new Vaga();
                $temp->id = $sql[0];
                $temp->nome = $sql[1];
                $temp->latitude = $sql[2];
                $temp->longitude = $sql[3];
                $temp->disponivel = $sql[4];
                $con = null;

                return $temp;
            } else {
                return null;
            }
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
}