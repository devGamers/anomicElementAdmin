<?php

class DAOFactory
{
    private $connexion;

    public function __construct()
    {
        try {
            $pdo_options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_PERSISTENT =>  true);
            $this->connexion = new PDO('mysql:host=localhost;dbname=anomic;charset=utf8', 'root', '', $pdo_options);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function getConnexion() {
        return $this->connexion;
    }
}