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

    public function numberOfArtisteByType() {
        try {
            $connexion = $this->factory->getConnexion();
            $requete = $connexion->prepare('Select count(*) as nbr from artistes where type_artistes_id = :type');
            $requete->bindValue(':type', $this->obj->getTypeArtistesId());
            $requete->execute();
            return $requete->fetch();
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function existeByName() {
        try {
            $connexion = $this->factory->getConnexion();
            $requete = $connexion->prepare("select * from artistes where name=:data1");
            $requete->bindValue(':data1', $this->obj->getName());
            $requete->execute();
            return $requete->fetch();
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

    public function ajouter()
    {
        try {
            $connexion = $this->factory->getConnexion();
            $requete = $connexion->prepare('insert into artistes(name, photo, description, liens, type_artistes_id,
                                                    admins_id) values (:data1, :data2, :data3, :data4, :data5, :data6)');
            $requete->bindValue(':data1', $this->obj->getName());
            $requete->bindValue(':data2', $this->obj->getPhoto());
            $requete->bindValue(':data3', $this->obj->getDescription());
            $requete->bindValue(':data4', $this->obj->getLiens());
            $requete->bindValue(':data5', $this->obj->getTypeArtistesId());
            $requete->bindValue(':data6', $this->obj->getAdminsId());
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
            $requete = $connexion->prepare('update artistes set name=:data1, photo=:data2, description=:data3, 
                    liens=:data4, type_artistes_id=:data5 where id=:data6');
            $requete->bindValue(':data1', $this->obj->getName());
            $requete->bindValue(':data2', $this->obj->getPhoto());
            $requete->bindValue(':data3', $this->obj->getDescription());
            $requete->bindValue(':data4', $this->obj->getLiens());
            $requete->bindValue(':data5', $this->obj->getTypeArtistesId());
            $requete->bindValue(':data6', $this->obj->getId());
            return $requete->execute();
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function supprimer()
    {
        try {
            $connexion = $this->factory->getConnexion();
            $requete = $connexion->prepare('Delete from artistes where id=:id');
            $requete->bindValue(':id', $this->obj->getId());
            return $requete->execute();
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