<?php

namespace Controller;
use Model\MapManager;
use Model\Bonbondex;
use Twig_Loader_Filesystem;
use Twig_Environment;
use GuzzleHttp\Client;


class MapController extends AbstractController
{

    public function index()
    {
        
      /*   $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://api.openstreetmap.org/api/0.6/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);

        $response = $client->request('GET', 'map?bbox=11.54,48.14,11.543,48.145');
 */

        //var_dump($response);
        $MapManager = new MapManager($this->getPdo());
        $datas = $MapManager->selectDatas();

        return $this->twig->render('Map/map.html.twig', ['datas' => $datas]);

    }

}
?>