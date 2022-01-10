<?php

class AdminDAO extends DAO
{
    private $admin;
    private $factory;

    public function __construct($admin)
    {
        $this->admin = $admin;
        $this->factory = new DaoFactory();
    }

    public function recherche($search) {

    }

    //envoi les données d'un admin en fonction de son username et du mot de passe
    public function getAdminInfoByUsernamePassword($password) {
        try {
            $connexion = $this->factory->getConnexion();
            $requete = $connexion->prepare("Select * from admins where username = :user and password = :pass");
            $requete->bindValue("user", $this->admin->getUsername());
            $requete->bindValue("pass", $password);
            $requete->execute();
            return $requete->fetch();
        }catch (Exception $exception) {
            die("Erreur : " . $exception->getMessage());
        }
    }

    public function readOne()
    {
        // TODO: Implement readOne() method.
    }

    public function ajouter()
    {
        // TODO: Implement ajouter() method.
    }

    public function modifier()
    {
        // TODO: Implement modifier() method.
    }

    public function supprimer()
    {
        // TODO: Implement supprimer() method.
    }

    public function readAll()
    {
        // TODO: Implement readAll() method.
    }
}