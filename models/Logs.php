<?php

class Logs extends Model
{
    private $adminsName;
    private $titre;
    private $description;
    private $adminsId;
    private $evenementsId = null;
    private $typeArtistesId = null;
    private $artistesId = null;
    private $galeriesId = null;
    private $membresId = null;

    public function __construct($data = false)
    {
        if ($data) {
            $this->adminsName = $data[0];
            $this->titre = $data[1];
            $this->description = $data[2];
            $this->adminsId = $data[3];
            $this->evenementsId = $data[4];
            $this->typeArtistesId = isset($data[5]) ? $data[5] : null;
            $this->artistesId = isset($data[6]) ? $data[6] : null;
            $this->galeriesId = isset($data[7]) ? $data[7] : null;
            $this->membresId = isset($data[8]) ? $data[8] : null;
        }
        $this->table = "logs";
    }

    /**
     * @return mixed|null
     */
    public function getMembresId()
    {
        return $this->membresId;
    }

    /**
     * @return mixed|null
     */
    public function getGaleriesId()
    {
        return $this->galeriesId;
    }

    /**
     * @return mixed|null
     */
    public function getArtistesId()
    {
        return $this->artistesId;
    }

    /**
     * @return mixed|null
     */
    public function getTypeArtistesId()
    {
        return $this->typeArtistesId;
    }

    /**
     * @return mixed
     */
    public function getEvenementsId()
    {
        return $this->evenementsId;
    }

    /**
     * @return mixed
     */
    public function getAdminsId()
    {
        return $this->adminsId;
    }

    /**
     * @return mixed
     */
    public function getAdminsName()
    {
        return $this->adminsName;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }
}