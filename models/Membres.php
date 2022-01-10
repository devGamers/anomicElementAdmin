<?php

class Membres extends Model
{
    private $name;
    private $role;

    public function __construct($data)
    {
        if($data) {
            $this->name = $data[0];
            $this->role = $data[1];
            $this->id = $data[2];
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


}