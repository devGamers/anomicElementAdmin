<?php

class TypeArtisteDAO extends DAO
{

    private $obj;
    private $factory;

    public function __construct($obj)
    {
        $this->obj = $obj;
        $this->factory = new DaoFactory();
    }

    public function recherche($search) {
        try {
            $connexion = $this->factory->getConnexion();
            $requete = $connexion->prepare("select * from type_artistes where libelle LIKE :search");
            $requete->bindValue(':search', '%'.$search.'%');
            $requete->execute();
            return $requete->fetchAll();
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function readByLib() {
        try {
            $connexion = $this->factory->getConnexion();
            $requete = $connexion->prepare("select * from type_artistes where libelle=:lib");
            $requete->bindValue(':lib', $this->obj->getLibelle());
            $requete->execute();
            return $requete->fetch();
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function readOne()
    {
        // TODO: Implement readOne() method.
        try {
            $connexion = $this->factory->getConnexion();
            $requete = $connexion->prepare('Select * from type_artistes where id=:id');
            $requete->bindValue(':id', $this->obj->getId());
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
            $requete = $connexion->prepare('Select * from type_artistes order by id desc');
            $requete->execute();
            return $requete->fetchAll();
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }
}