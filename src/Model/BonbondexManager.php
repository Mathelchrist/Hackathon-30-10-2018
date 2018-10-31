<?php

/**
 * Created by PhpStorm.
 * User: wcs
 * Date: 23/10/17
 * Time: 10:57
 * PHP version 7
 */

namespace Model;

use Model\Bonbondex;


/**
 * Class Map
 *
 */
class BonbondexManager extends AbstractManager
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
    public function insert(Bonbondex $bonbondex)
    {

        // prepared request
        $statement = $this->pdo->prepare("INSERT INTO $this->table (`joueur_id`, `bonbon_id`, `longitude`, `latitude`) VALUES (:joueur_id, :bonbon_id, :longitude, :latitude)");
        $statement->bindValue('bonbon_id', $bonbondex->getBonbonId(), \PDO::PARAM_INT);
        $statement->bindValue('joueur_id', $_SESSION['id'], \PDO::PARAM_INT);
        $statement->bindValue('longitude', $bonbondex->getLongitude(), \PDO::PARAM_STR);
        $statement->bindValue('latitude', $bonbondex->getLatitude(), \PDO::PARAM_STR);

        var_dump($_SESSION['id']);
        if ($statement->execute()) {
            return $this->pdo->lastInsertId();
        }
    }

    public function delete(int $id): void
    {
        // prepared request
        $statement = $this->pdo->prepare("DELETE FROM $this->table WHERE joueur_id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
    }
}
