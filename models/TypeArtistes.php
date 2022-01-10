<?php

class TypeArtistes extends Model
{
    private $libelle;

    public function __construct($data)
    {
        if ($data) {
            $this->libelle = $data[0];
            $this->id = $data[1];
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
}