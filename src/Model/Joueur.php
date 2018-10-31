<?php
/**
 * Created by PhpStorm.
<<<<<<< Updated upstream
 * User: wcs
 * Date: 23/10/17
 * Time: 10:57
 * PHP version 7
=======
 * User: wilder6
 * Date: 30/10/18
 * Time: 16:05
>>>>>>> Stashed changes
 */

namespace Model;

/**
 * Class Joueur
 *
 */
class Joueur
{
    private $id;

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
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    private $nom;

}