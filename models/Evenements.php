<?php

class Evenements extends Model
{
    private $libelle;
    private $description;
    private $image;
    private $date;
    private $debut;
    private $fin;

    public function __construct($data = false)
    {
        if ($data) {
            $this->libelle = $data[0];
            $this->description = $data[1];
            $this->image = $data[2];
            $this->date = $data[3];
            $this->debut = $data[4];
            $this->fin = $data[5];
            $this->id = $data[6];
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