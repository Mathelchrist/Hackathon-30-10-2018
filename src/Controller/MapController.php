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

        if($_GET) {
            $city = $_GET["adress_input"];
        } else {
            $city = "Orléans";
        }
        $uri = 'https://api-adresse.data.gouv.fr/search/?q='. $city .'&autocomplete=0';
    
        $client = new Client();

        $response = $client->request('GET', $uri);

        $body = $response->getBody();
        $json = json_decode($body->getContents(), true);
        $coords = $json["features"][0]["geometry"]["coordinates"];
        $lonPos = $coords[0];
        $latPos = $coords[1];

        return $this->twig->render('Map/map.html.twig', ['datas' => $datas, 'lonPos' => $lonPos, 'latPos' => $latPos, 'session' => $_SESSION['nom'] ]);

    }

}
?>
