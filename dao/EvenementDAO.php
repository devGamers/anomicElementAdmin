<?php

class EvenementDAO extends DAO
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

    public function recherche($search) {
        try {
            $connexion = $this->factory->getConnexion();
            $requete = $connexion->prepare("select * from evenements where libelle LIKE :search 
                            or description LIKE :search");
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
            $requete = $connexion->prepare('insert into evenements(libelle, description, image, date, admins_id, debut, fin) 
                                                values (:lib, :desc, :img, :date, :id, :deb, :fin)');
            $requete->bindValue(':lib', $this->obj->getLibelle());
            $requete->bindValue(':desc', $this->obj->getDescription());
            $requete->bindValue(':img', $this->obj->getImage());
            $requete->bindValue(':date', $this->obj->getDate());
            $requete->bindValue(':id', $this->obj->getAdminsId());
            $requete->bindValue(':deb', $this->obj->getDebut());
            $requete->bindValue(':fin', $this->obj->getFin());
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
            $requete = $connexion->prepare('update evenements set libelle=:lib, description=:desc,
                      image=:img, date=:date, admins_id=:id, debut=:deb, fin=:fin where id=:event');
            $requete->bindValue(':desc', $this->obj->getDescription());
            $requete->bindValue(':lib', $this->obj->getLibelle());
            $requete->bindValue(':img', $this->obj->getImage());
            $requete->bindValue(':date', $this->obj->getDate());
            $requete->bindValue(':id', $this->obj->getAdminsId());
            $requete->bindValue(':deb', $this->obj->getDebut());
            $requete->bindValue(':fin', $this->obj->getFin());
            $requete->bindValue(':event', $this->obj->getId());
            return $requete->execute();
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function supprimer()
    {
        try {
            $connexion = $this->factory->getConnexion();
            $requete = $connexion->prepare('Delete from evenements where id=:id');
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
            $requete = $connexion->prepare('Select * from evenements where id=:id');
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
            $requete = $connexion->prepare('Select * from evenements order by date desc');
            $requete->execute();
            return $requete->fetchAll();
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }
}