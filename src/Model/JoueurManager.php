<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/03/18
 * Time: 18:20
 * PHP version 7
 */

namespace Model;

/**
 *
 */
class JoueurManager extends AbstractManager
{
    /**
     *
     */
    const TABLE = 'joueur';

    /**
     *  Initializes this class.
     */
    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }


    /**
     * @param Joueur $joueur
     * @return int
     */
    public function insert(Joueur $joueur): int
    {

        $statement = $this->pdo->prepare("INSERT INTO $this->table (`nom`) VALUES (:nom)");
        $statement->bindValue('nom', $joueur->getNom(), \PDO::PARAM_STR);


        if ($statement->execute()) {
            return $this->pdo->lastInsertId();
        }
    }


    /**
     * @param int $id
     */
    public function delete(int $id): void
    {
        // prepared request
        $statement = $this->pdo->prepare("DELETE FROM $this->table WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
    }


    /**
     * @param Joueur $joueur
     * @return int
     */
    public function update(Joueur $joueur):int
    {

        // prepared request
        $statement = $this->pdo->prepare("UPDATE $this->table SET `nom` = :nom WHERE id=:id");
        $statement->bindValue('id', $joueur->getId(), \PDO::PARAM_INT);
        $statement->bindValue('nom', $joueur->getNom(), \PDO::PARAM_STR);


        return $statement->execute();
    }
}
