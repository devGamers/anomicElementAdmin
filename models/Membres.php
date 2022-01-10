<?php

class Membres extends Model
{
    private $name;
    private $role;
    private $adminsId;

    public function __construct($data)
    {
        if($data) {
            $this->name = $data[0];
            $this->role = $data[1];
            $this->adminsId = $data[2];
            $this->id = $data[3];
        }
        $this->table = "membres";
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
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @return mixed
     */
    public function getAdminsId()
    {
        return $this->adminsId;
    }


}