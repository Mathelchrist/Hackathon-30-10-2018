<?php
/**
 * Created by PhpStorm.
 * User: wilder6
 * Date: 30/10/18
 * Time: 16:03
 */

namespace Model;


class ConnexionManager extends AbstractManager
{

    const TABLE = 'joueur';

    /**
     *  Initializes this class.
     */
    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }


    /**
     * @param Item $item
     * @return int
     */
    public function insert($joueur)
    {
        // prepared request
        $statement = $this->pdo->prepare("INSERT INTO $this->table (`pseudo`) VALUES (:pseudo)");
        $statement->bindValue('pseudo', $joueur->getPseudo(), \PDO::PARAM_STR);


        if ($statement->execute()) {
            return $this->pdo->lastInsertId();
        }
    }

}