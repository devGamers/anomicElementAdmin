<?php

class Artistes extends Model
{
    private $name;
    private $photo;
    private $description;
    private $liens;
    private $type_artistes_id;
    private $admins_id;

    /**
     * @param $name
     * @param $photo
     * @param $type_artistes_id
     */
    public function __construct($data)
    {
        if ($data) {
            $this->id = $data[0];
            $this->name = $data[1];
            $this->photo = $data[2];
            $this->description = $data[3];
            $this->liens = $data[4];
            $this->type_artistes_id = $data[5];
            $this->admins_id = $data[6];
        }
    }

    /**
     * @return mixed
     */
    public function getAdminsId()
    {
        return $this->admins_id;
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
    public function getLiens()
    {
        return $this->liens;
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
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @return mixed
     */
    public function getTypeArtistesId()
    {
        return $this->type_artistes_id;
    }

    /**
     * @param mixed|null $type_artistes_id
     */
    public function setTypeArtistesId($type_artistes_id)
    {
        $this->type_artistes_id = $type_artistes_id;
    }
}