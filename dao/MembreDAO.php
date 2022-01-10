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

    public function ajouter()
    {
        try {
            $connexion = $this->factory->getConnexion();
            $requete = $connexion->prepare('insert into membres(name, role, admins_id) values (:data1, :data2, :data3)');
            $requete->bindValue(':data1', $this->obj->getName());
            $requete->bindValue(':data2', $this->obj->getRole());
            $requete->bindValue(':data3', $this->obj->getAdminsId());
            $requete->execute();
            return $connexion->lastInsertId();
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function modifier()
    {
        try {
            $connexion = $this->factory->getConnexion();
            $requete = $connexion->prepare('update membres set name=:data1, role=:data2 where id=:data3');
            $requete->bindValue(':data1', $this->obj->getName());
            $requete->bindValue(':data2', $this->obj->getRole());
            $requete->bindValue(':data3', $this->obj->getId());
            return $requete->execute();
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function supprimer()
    {
        try {
            $connexion = $this->factory->getConnexion();
            $requete = $connexion->prepare('delete from membres where id=:data1');
            $requete->bindValue(':data1', $this->obj->getId());
            return $requete->execute();
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