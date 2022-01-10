<?php

class GalerieDAO extends DAO
{

    private $obj;
    private $factory;

    public function __construct($obj)
    {
        $this->obj = $obj;
        $this->factory = new DaoFactory();
    }

    public function ajouter()
    {
        try {
            $connexion = $this->factory->getConnexion();
            $requete = $connexion->prepare('insert into galeries(image, evenements_id, artistes_id, admins_id) 
                        values (:data1, :data2, :data3, :data4)');
            $requete->bindValue(':data1', $this->obj->getImage());
            $requete->bindValue(':data2', $this->obj->getEvenementsId());
            $requete->bindValue(':data3', $this->obj->getArtistesId());
            $requete->bindValue(':data4', $this->obj->getAdminsId());
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
            $requete = $connexion->prepare('update galeries set image=:data1, evenements_id=:data2, artistes_id=:data3 where id=:data4');
            $requete->bindValue(':data1', $this->obj->getImage());
            $requete->bindValue(':data2', $this->obj->getEvenementsId());
            $requete->bindValue(':data3', $this->obj->getArtistesId());
            $requete->bindValue(':data4', $this->obj->getId());
            return $requete->execute();
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function supprimer()
    {
        try {
            $connexion = $this->factory->getConnexion();
            $requete = $connexion->prepare('delete from galeries where id=:data1');
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
            $requete = $connexion->prepare('select * from galeries where id=:data1');
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
            $requete = $connexion->prepare('select * from galeries order by id desc');
            $requete->execute();
            return $requete->fetchAll();
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function recherche($search)
    {
        $search = explode('€', $_POST['search']);
        $id = $search[0];
        $type = $search[1];

        try {
            $connexion = $this->factory->getConnexion();
            $query = "select * from galeries ";
            if ($type == 'event') {
                $query .= "where evenements_id=:data1";
            }else{
                $query .= "where artistes_id LIKE :data1";
            }
            $requete = $connexion->prepare($query);
            $requete->bindValue(':data1', $type == 'event' ? $id : '%'.$id.'%');
            $requete->execute();
            return $requete->fetchAll();
        }catch (Exception $e) {
            die($e->getMessage());
        }

    }
}