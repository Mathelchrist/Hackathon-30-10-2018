<?php

namespace Controller;

use Model\MapManager;
use Model\Bonbondex;
use Twig_Loader_Filesystem;
use Twig_Environment;
use GuzzleHttp\Client;

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

        return $this->twig->render('Map/map.html.twig', ['datas' => $datas, 'session' => $_SESSION['nom']]);

    }

}
?>
