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
class MapManager extends AbstractManager
{
    /**
     *
     */
    const TABLE = 'bonbondex';

    /**
     *  Initializes this class.
     */
    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }

    public function selectDatas($field = '', $order = 'ASC'): array
    {
        $query = 'SELECT
        bonbondex.id,
        adresse.longitude,
        adresse.latitude,
        bonbon.nom AS bonbon_nom,
        bonbon.image_url AS bonbon_image,
        joueur.nom AS joueur_nom
        FROM ' . self::TABLE . '
        JOIN adresse ON bonbondex.adresse_id = adresse.id
        JOIN bonbon ON bonbon_id = bonbon.id
        JOIN joueur ON bonbondex.joueur_id = joueur.id';
        if ($field) {
            $query .= ' ORDER BY ' . $field . ' ' . $order;
        }
        return $this->pdo->query($query, \PDO::FETCH_CLASS, $this->className)->fetchAll();
    }

}
