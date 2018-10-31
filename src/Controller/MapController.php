<?php

namespace Controller;

use Model\MapManager;
use Model\Bonbondex;
use Twig_Loader_Filesystem;
use Twig_Environment;
use Controller\DataBaseController;


/**
 * Created by PhpStorm.
 * User: wilder4
 * Date: 30/10/18
 * Time: 11:29
 */

class MapController extends AbstractController
 {
    public function index()
    {
        if(!isset($_SESSION['id'])) {
            header('location: /players');
            exit();
        }
        $MapManager = new MapManager($this->getPdo());
        $datas = $MapManager->selectDatas();

        if (!isset($_SESSION['city']) && !isset($_SESSION['adresse'])) {
            $_SESSION['city'] = "Orléans";
            $_SESSION['adresse'] = "1 avenue du champs de mars";
            $coord = $this->setUserPosition($_SESSION['adresse']. ' ' .$_SESSION['city']);
            $dataBaseController = new DataBaseController();
            $dataBaseController->affectAdresse($coord);
            header('Location: /');
        } elseif (!empty($_POST['city_input'])) {
            if ($_POST['city_input'] != $_SESSION['city']) {
                $_SESSION['city'] = $_POST['city_input'];
                $_SESSION['adresse'] = $_POST['adresse_input'] ?? '';
                $coord = $this->setUserPosition($_SESSION['adresse']. ' ' .$_SESSION['city']);
                $dataBaseController = new DataBaseController();
                $dataBaseController->affectAdresse($coord);
                header('Location: /');
             } else {
                $_SESSION['adresse'] = $_POST['adresse_input'];
                $coord = $this->setUserPosition($_SESSION['adresse']. ' ' .$_SESSION['city']);
            }
        } else {
            $coord = $this->setUserPosition($_SESSION['adresse']. ' ' .$_SESSION['city']);
        }

         if(!isset($_POST['search'])) {
            $_POST['search'] = "null";
        }


        return $this->twig->render('Map/map.html.twig', ['datas' => $datas, 'coord' => $coord, 'session' => $_SESSION, 'post' => $_POST['search'] ]);

    }

}
?>
