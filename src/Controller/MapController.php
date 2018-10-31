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
        session_start();
        if(!($_SESSION['id'])) {
            header('location: /players');
            exit();
        }
        $MapManager = new MapManager($this->getPdo());
        $datas = $MapManager->selectDatas();

        if($_GET) {
            $city = $_GET["adress_input"];
        } else {
            $city = "Orléans";
        }
        
        $coord = $this->setUserPosition($city);

        $dataBaseController = new DataBaseController();
        $dataBaseController->affectAdresse($coord);
        
        if(!isset($_POST['search'])) {
            $_POST['search'] = "null";
        }


        return $this->twig->render('Map/map.html.twig', ['datas' => $datas, 'coord' => $coord, 'session' => $_SESSION['nom'], 'post' => $_POST['search'] ]);

    }

}
?>
