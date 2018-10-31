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

    public function truncateAdresse() {
        $statement = $this->pdo->prepare("TRUNCATE TABLE adresse");
        $statement->execute();
    }

    public function affectAddress(int $id, float $latitude, float $longitude)
    {
        $statement = $this->pdo->prepare(
            "INSERT INTO adresse (`bonbon_id`, `quantite`, `latitude`, `longitude`) 
                       VALUES (:bonbonID, :quantite, :latitude, :longitude)");
        $statement->bindValue('bonbonID', $id, \PDO::PARAM_INT);
        $statement->bindValue('quantite', 1, \PDO::PARAM_INT);
        $statement->bindValue('latitude', $latitude, \PDO::PARAM_STR);
        $statement->bindValue('longitude', $longitude, \PDO::PARAM_STR);


        $statement->execute();
    }
}