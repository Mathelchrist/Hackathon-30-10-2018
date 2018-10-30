<?php
/**
 * Created by PhpStorm.
 * User: wilder6
 * Date: 30/10/18
 * Time: 16:02
 */

namespace Controller;


use Model\ConnexionManager;
use Model\Joueur;

class ConnexionController
{

    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $itemManager = new ConnexionManager($this->getPdo());
            $item = new Joueur();
            $item->setTitle($_POST['title']);
            $id = $itemManager->insert($item);
            header('Location:/');
        }

        return $this->twig->render('Item/add.html.twig');
    }
}