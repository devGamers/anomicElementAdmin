<?php

class MembreDAO extends DAO
{
    private $obj;
    private $factory;

    public function __construct($obj)
    {
        $this->obj = $obj;
        $this->factory = new DaoFactory();
    }

    public function existeByName() {
        try {
            $connexion = $this->factory->getConnexion();
            $requete = $connexion->prepare("select * from membres where name=:data1");
            $requete->bindValue(':data1', $this->obj->getName());
            $requete->execute();
            return $requete->fetch();
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function readOne()
    {
        try {
            $connexion = $this->factory->getConnexion();
            $requete = $connexion->prepare('select * from membres where id=:data1');
            $requete->bindValue(':data1', $this->obj->getId());
            $requete->execute();
            return $requete->fetch();
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function readAll()
    {
        try {
            $connexion = $this->factory->getConnexion();
            $requete = $connexion->prepare('select * from membres order by id desc ');
            $requete->execute();
            return $requete->fetchAll();
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function recherche($search)
    {
        try {
            $connexion = $this->factory->getConnexion();
            $requete = $connexion->prepare('select * from membres where name LIKE :search or role LIKE :search ');
            $requete->bindValue(':search', '%'.$search.'%');
            $requete->execute();
            return $requete->fetchAll();
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }
}