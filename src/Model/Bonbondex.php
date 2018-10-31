<?php

namespace Model;



class Bonbondex
{
    private $id;
    private $joueur_id;
    private $bonbon_id;
    private $longitude;
    private $latitude;
    protected $quantite;

    /**
     * @return mixed
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @param mixed $quantite
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getJoueurId()
    {
        return $this->joueur_id;
    }

    /**
     * @param mixed $joueur_id
     */
    public function setJoueurId($joueur_id)
    {
        $this->joueur_id = $joueur_id;
    }

    /**
     * @return mixed
     */
    public function getBonbonId()
    {
        return $this->bonbon_id;
    }

    /**
     * @param mixed $bonbon_id
     */
    public function setBonbonId($bonbon_id)
    {
        $this->bonbon_id = $bonbon_id;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

}