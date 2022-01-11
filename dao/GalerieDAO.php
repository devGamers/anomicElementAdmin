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
        $search = explode('€', $search);
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