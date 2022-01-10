<?php

class ArtisteDAO extends DAO
{

    private $obj;
    private $factory;

    public function __construct($obj)
    {
        $this->obj = $obj;
        $this->factory = new DaoFactory();
    }

    public function setId($id) {
        $this->obj->setId($id);
    }

    public function setTypeArtistesId($type_artiste) {
        $this->obj->setTypeArtistesId($type_artiste);
    }

    public function getArtisteByType() {
        try {
            $connexion = $this->factory->getConnexion();
            $requete = $connexion->prepare('Select a.*, t.libelle from artistes a, type_artistes t where a.type_artistes_id = t.id and  a.type_artistes_id = :type');
            $requete->bindValue(':type', $this->obj->getTypeArtistesId());
            $requete->execute();
            return $requete->fetchAll();
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function recherche($search) {
        try {
            $connexion = $this->factory->getConnexion();
            $requete = $connexion->prepare("select  a.*, t.libelle from artistes a, type_artistes t 
                                                where a.type_artistes_id = t.id and name LIKE :search");
            $requete->bindValue(':search', '%'.$search.'%');
            $requete->execute();
            return $requete->fetchAll();
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function readOne()
    {
        try {
            $connexion = $this->factory->getConnexion();
            $requete = $connexion->prepare('Select a.*, t.libelle from artistes a, type_artistes t 
                                                where a.type_artistes_id = t.id and a.id=:id');
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
            $requete = $connexion->prepare('Select a.*, t.libelle from artistes a, type_artistes t 
                                                where a.type_artistes_id = t.id order by a.id desc');
            $requete->execute();
            return $requete->fetchAll();
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }
}