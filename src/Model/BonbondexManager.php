<?php

/**
 * Created by PhpStorm.
 * User: wcs
 * Date: 23/10/17
 * Time: 10:57
 * PHP version 7
 */

namespace Model;

use Model\Bonbon;


/**
 * Class Map
 *
 */
class Bonbondex extends AbstractManager
{

    const TABLE = 'bonbondex';

    /**
     *  Initializes this class.
     */
    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }
    /**
     * @param $bonbondex
     * @return string
     */
    public function insert( $bonbondex)
    {
        // prepared request
        $statement = $this->pdo->prepare("INSERT INTO $this->table (`joueur_id`, `bonbon_id`,`quantite`, `longitude`, `latitude`) VALUES (:joueur_id, :bonbon_id,:quantite, :longitude, :latitude)");
        $statement->bindValue('bonbon_id', $bonbondex->getId(), \PDO::PARAM_INT);
        $statement->bindValue('joueur_id', $bonbondex->getJoueurId(), \PDO::PARAM_INT);
        $statement->bindValue('longitude', $bonbondex->getLongitude(), \PDO::PARAM_INT);
        $statement->bindValue('latitude', $bonbondex->getJoueurId(), \PDO::PARAM_INT);


        if ($statement->execute()) {
            return $this->pdo->lastInsertId();
        }
    }
}
