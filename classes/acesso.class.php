<?php


class Acesso
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAcesso($hora)
    {
        $sql = "SELECT * from tb_acessos where hora > :hora";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':hora',$hora);
        if ($sql->rowCount() > 0) {
            return $acessos = $sql->fetchAll();
        } else {
            return [];
        }
    }

    public function registrarAcessos($ip,$hora)
    {
        $sql = "INSERT INTO tb_acessos(ip,hora) VALUES (:ip,:hora)";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':ip',$ip);
        $sql->bindValue(':hora',date("H:i:s",strtotime("-5 minutes")));
        $sql->execute();
    }


}