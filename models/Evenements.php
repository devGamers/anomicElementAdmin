<?php

class Evenements extends Model
{
    private $libelle;
    private $description;
    private $image;
    private $date;
    private $adminsId;
    private $debut;
    private $fin;

    public function __construct($data = false)
    {
        if ($data) {
            $this->libelle = $data[0];
            $this->description = $data[1];
            $this->image = $data[2];
            $this->date = $data[3];
            $this->adminsId = $data[4];
            $this->debut = $data[5];
            $this->fin = $data[6];
            $this->id = $data[7];
        }
        $this->table = "evenements";
    }

    /**
     * @return mixed
     */
    public function getDebut()
    {
        return $this->debut;
    }

    /**
     * @return mixed
     */
    public function getFin()
    {
        return $this->fin;
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
    public function getAdminsId()
    {
        return $this->adminsId;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
}