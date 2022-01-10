<?php

class TypeArtistes extends Model
{
    private $libelle;
    private $adminId;

    public function __construct($data)
    {
        if ($data) {
            $this->libelle = $data[0];
            $this->adminId = $data[1];
            $this->id = $data[2];
        }
        $this->table = "type_artistes";
    }

    /**
     * @return mixed|null
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @return mixed|null
     */
    public function getAdminId()
    {
        return $this->adminId;
    }
}