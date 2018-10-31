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

        if (!isset($_SESSION['city'])) {
            $_SESSION['city'] = "Orléans";
            $coord = $this->setUserPosition($_SESSION['city']);
            $dataBaseController = new DataBaseController();
            $dataBaseController->affectAdresse($coord);
            header('Location: /');
        } elseif (isset($_GET['adress_input']) && !empty($_GET['adress_input']) &&
                 (isset($_SESSION['city']) && $_GET['adress_input'] != $_SESSION['city'])) {
            $_SESSION['city'] = $_GET["adress_input"];
            $coord = $this->setUserPosition($_SESSION['city']);
            $dataBaseController = new DataBaseController();
            $dataBaseController->affectAdresse($coord);
            header('Location: /');
        } else {
            $coord = $this->setUserPosition($_SESSION['city']);
        }

        if(!isset($_POST['search'])) {
            $_POST['search'] = "null";
        }


        return $this->twig->render('Map/map.html.twig', ['datas' => $datas, 'coord' => $coord, 'session' => $_SESSION['nom'], 'post' => $_POST['search'] ]);

    }

}
?>
