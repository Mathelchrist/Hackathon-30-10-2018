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
        $query = 'SELECT adresse.adresse, adresse.code_postal,adresse.ville, adresse.longitude, adresse.latitude, bonbon.id, bonbon.nom, bonbon.image_url  FROM '. $this->table.
                    ' JOIN adresse ON adresse.id=quantite.adresse_id JOIN bonbon ON bonbon.id=quantite.bonbon_id';

        return $this->pdo->query($query, \PDO::FETCH_ASSOC)->fetchAll();
    }
}
