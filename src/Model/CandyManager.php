<?php

namespace Model;

class CandyManager extends AbstractManager
{
    /**
     *
     */
    const TABLE = 'bonbon';

    /**
     *  Initializes this class.
     */
    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }

    public function searchCandy(string $name) {
        $query = 'SELECT id FROM ' . $this->table . ' WHERE nom LIKE "%' . htmlentities($name) .'" ';
        $result = $this->pdo->query($query, \PDO::FETCH_ASSOC)->fetch();

        return $result['id'];
    }

    /**
     * @param Item $item
     * @return int
     */
    public function addCandy(Candy $candy)
    {
        $exist = $this->searchCandy($candy->getNom());

        if ($exist == 0) {
            // prepared request
            $statement = $this->pdo->prepare(
                "INSERT INTO $this->table (`nom`, `image_url`, `code_barre`, `categorie_id`) 
                       VALUES (:nom, :image_url, :code_barre, :categorie_id)");
            $statement->bindValue('nom', $candy->getNom(), \PDO::PARAM_STR);
            $statement->bindValue('image_url', $candy->getImageUrl(), \PDO::PARAM_STR);
            $statement->bindValue('code_barre', $candy->getCodeBarre(), \PDO::PARAM_STR);
            $statement->bindValue('categorie_id', $candy->getCategorieId(), \PDO::PARAM_STR);

            if ($statement->execute()) {
                return $this->pdo->lastInsertId();
            }
        }
    }

    public function randomAddress() : int
    {
        $query = 'SELECT SQL_NO_CACHE id FROM adresse WHERE RAND() > 0.9 ORDER BY RAND() LIMIT 1';
        $result = $this->pdo->query($query, \PDO::FETCH_ASSOC)->fetch();

        return $result['id'];
    }


    public function affectAddress(int $bonbonID)
    {
        $randomAddressID = $this->randomAddress();

        $statement = $this->pdo->prepare(
          "INSERT INTO quantite (`bonbon_id`, `adresse_id`, `quantite`) VALUES (:bonbonID, :addressID, :quantite)");
        $statement->bindValue('bonbonID', $bonbonID, \PDO::PARAM_INT);
        $statement->bindValue('addressID', $randomAddressID, \PDO::PARAM_INT);
        $statement->bindValue('quantite', 1, \PDO::PARAM_INT);

        $statement->execute();
    }

}

