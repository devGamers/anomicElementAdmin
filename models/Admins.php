<?php

class Admins extends Model
{
    private $name;
    private $username;
    private $profil;
    private $showLogs;

    public function __construct($data = false)
    {
        if($data) {
            $this->name = $data[0];
            $this->username = $data[1];
            $this->profil = $data[2];
            $this->showLogs = $data[3];
        }
        $this->table = "admins";
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $profil
     */
    public function setProfil($profil)
    {
        $this->profil = $profil;
    }

    /**
     * @param mixed $showLogs
     */
    public function setShowLogs($showLogs)
    {
        $this->showLogs = $showLogs;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getProfil()
    {
        return $this->profil;
    }

    /**
     * @return mixed
     */
    public function getShowLogs()
    {
        return $this->showLogs;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

}