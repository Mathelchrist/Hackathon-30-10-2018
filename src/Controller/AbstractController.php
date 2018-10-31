<?php

namespace Controller;

use Twig_Loader_Filesystem;
use Twig_Environment;
use App\Connection;
use GuzzleHttp\Client;

abstract class AbstractController
{
    /**
     * @var Twig_Environment
     */
    protected $twig;

    /**
     * @var \PDO
     */
    protected $pdo;
    private $coord;

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        $loader = new Twig_Loader_Filesystem(APP_VIEW_PATH);
        $this->twig = new Twig_Environment(
            $loader,
            [
                'cache' => !APP_DEV,
                'debug' => APP_DEV,
            ]
        );
        $this->twig->addExtension(new \Twig_Extension_Debug());

        $connection = new Connection();
        $this->pdo = $connection->getPdoConnection();
    }

    /**
     * @return \PDO
     */
    public function getPdo(): \PDO
    {
        return $this->pdo;
    }

    public function setUserPosition($input) {
        $uri = 'https://api-adresse.data.gouv.fr/search/?q='. urlencode($input) .'&autocomplete=0';
    
        $client = new Client();

        $response = $client->request('GET', $uri);

        $body = $response->getBody();
        $json = json_decode($body->getContents(), true);
        $coords = $json["features"][0]["geometry"]["coordinates"];
        $lonPos = $coords[0];
        $latPos = $coords[1];
        $this->coord = [$latPos, $lonPos];

        return $this->coord;
    }

    public function getUserPosition() {
        return $this->coord;
    }
}
