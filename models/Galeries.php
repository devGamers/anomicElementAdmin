<?php

class Galeries extends Model
{
    private $image;
    private $evenementsId;
    private $artistesId;
    private $adminsId;

    public function __construct($data)
    {
        if($data) {
            $this->image = $data[0];
            $this->evenementsId = $data[1];
            $this->artistesId = $data[2];
            $this->adminsId = $data[3];
            $this->id = $data[4];
        }
        $this->table = "galeries";
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
    public function getEvenementsId()
    {
        return $this->evenementsId;
    }

    /**
     * @return mixed
     */
    public function getArtistesId()
    {
        return $this->artistesId;
    }

    /**
     * @return mixed
     */
    public function getAdminsId()
    {
        return $this->adminsId;
    }


}