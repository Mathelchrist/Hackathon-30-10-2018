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
        session_start();

        $query = 'SELECT
        bonbon.id,
        bonbon.nom AS bonbon_nom,
        bonbon.image_url AS bonbon_image,
        adresse.longitude AS longitude,
        adresse.latitude AS latitude,
        joueur.nom AS joueur_nom
        FROM joueur
        JOIN bonbondex ON joueur.id = bonbondex.joueur_id 
        RIGHT OUTER JOIN bonbon ON bonbondex.bonbon_id = bonbon.id
        JOIN adresse ON adresse.bonbon_id = bonbon.id
        WHERE joueur.id IS NULL or joueur.id != '. $_SESSION["id"]
        . ' LIMIT 20';


       /*  'SELECT b.id,
         x.quantite,
          x.longitude AS longitudebonbonpris,
           x.latitude AS latitudebonbonpris,
            b.nom,
             b.image_url,
              a.longitude,
               a.latitude 
               FROM joueur j "
            ." JOIN bonbondex x ON j.id = x.joueur_id AND j.id = 1"
            ." RIGHT JOIN bonbon b ON x.bonbon_id = b.id"
            ." JOIN adresse a ON a.bonbon_id = b.id'
 */

/* SELECT distinct
bonbon.id,
bonbon.nom,
bonbon.image_url,
adresse.longitude,
adresse.latitude
FROM bonbon
JOIN adresse ON adresse.bonbon_id = bonbon.id
LEFT OUTER JOIN bonbondex ON bonbondex.bonbon_id = bonbon.id
WHERE bonbondex.bonbon_id = bonbon.id
 */


        if ($field) {
            $query .= ' ORDER BY ' . $field . ' ' . $order;
        }
        return $this->pdo->query($query, \PDO::FETCH_CLASS, $this->className)->fetchAll();
    }

}
