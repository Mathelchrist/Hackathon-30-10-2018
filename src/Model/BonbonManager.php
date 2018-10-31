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
class BonbonManager extends AbstractManager
{
    /**
     *
     */
    const TABLE = 'quantite';

    /**
     *  Initializes this class.
     */
    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }

    public function selectAllBonbon(): array
    {
        session_start();
        $query = "SELECT b.id, x.quantite, x.longitude AS longitudebonbonpris, x.latitude AS latitudebonbonpris, b.nom, b.image_url, a.longitude, a.latitude FROM joueur j "
            ." JOIN bonbondex x ON j.id = x.joueur_id AND j.id = " . $_SESSION['id']
            ." RIGHT JOIN bonbon b ON x.bonbon_id = b.id"
            ." JOIN adresse a ON a.bonbon_id = b.id";

        return $this->pdo->query($query, \PDO::FETCH_ASSOC)->fetchAll();
    }
}
