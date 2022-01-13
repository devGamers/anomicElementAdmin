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

    public function getAdminInfoByUsernameOrName() {
        try {
            $connexion = $this->factory->getConnexion();
            //$requete = $connexion->prepare("Select * from admins where username = :user or name=:name");
            $requete = $connexion->prepare("Select * from admins where username = :user");
            $requete->bindValue("user", $this->admin->getUsername());
            //$requete->bindValue("name", $this->admin->getName());
            $requete->execute();
            return $requete->fetch();
        }catch (Exception $exception) {
            die("Erreur : " . $exception->getMessage());
        }
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

    }

    public function modifier()
    {
        try {
            $connexion = $this->factory->getConnexion();
            $requete = $connexion->prepare("update admins set username = :user, name=:name, profil =:img where id=:id");
            $requete->bindValue("user", $this->admin->getUsername());
            $requete->bindValue("name", $this->admin->getName());
            $requete->bindValue("id", $this->admin->getId());
            $requete->bindValue("img", $this->admin->getProfil());
            return $requete->execute();
        }catch (Exception $exception) {
            die("Erreur : " . $exception->getMessage());
        }
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