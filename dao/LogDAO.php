<?php

class LogDAO extends DAO
{

    private $log;
    private $factory;

    public function __construct($log)
    {
        $this->log = $log;
        $this->factory = new DaoFactory();
    }

    public function recherche($search) {

    }

    public function ajouter()
    {
        // TODO: Implement ajouter() method.
        try {
            $connexion = $this->factory->getConnexion();
            $requete = $connexion->prepare('insert into logs(admins_name, titre, description, admins_id, evenements_id, 
                 type_artistes_id, artistes_id, galeries_id, membres_id) values (:name, :titre, :desc, :id, :event, :typeArt, :art, :gal, :mem)');
            $requete->bindValue(':name', $this->log->getAdminsName());
            $requete->bindValue(':titre', $this->log->getTitre());
            $requete->bindValue(':desc', $this->log->getDescription());
            $requete->bindValue(':id', $this->log->getAdminsId());
            $requete->bindValue(':event', $this->log->getEvenementsId());
            $requete->bindValue(':typeArt', $this->log->getTypeArtistesId());
            $requete->bindValue(':art', $this->log->getArtistesId());
            $requete->bindValue(':gal', $this->log->getGaleriesId());
            $requete->bindValue(':mem', $this->log->getMembresId());
            return $requete->execute();
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function modifier()
    {
        // TODO: Implement modifier() method.
    }

    public function supprimer()
    {
        // TODO: Implement supprimer() method.
    }

    public function readOne()
    {
        // TODO: Implement readOne() method.
    }

    public function readAll()
    {
        // TODO: Implement readAll() method.
    }
}