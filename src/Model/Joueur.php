<?php
/**
 * Created by PhpStorm.
 * User: wcs
 * Date: 23/10/17
 * Time: 10:57
 * PHP version 7
 */

namespace Model;

/**
 * Class Joueur
 *
 */
class Joueur
{
    private $id;

    private $nom;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return Joueur
     */
    public function setId($id): Joueur
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     *
     * @return Joueur
     */
    public function setNom($nom):Joueur
    {
        $this->nom = $nom;

        return $this;
    }
}
