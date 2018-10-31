<?php
namespace Controller;

use http\Env\Request;
use Model\Bonbon;
use Model\BonbonManager;
use Model\Bonbondex;
use Model\BonbondexManager;


class BonbondexController extends AbstractController
{
    public function index()
    {
        $bonbonManager = new BonbonManager($this->getPdo());
        $bonbons = $bonbonManager->selectAllBonbon();

        $coord = $this->setUserPosition($_SESSION['city']);

        for ($i=0; $i < count($bonbons); $i++) {
            if (!empty($bonbons[$i]['longitudebonbonpris'])) {
                $lng1 = $bonbons[$i]['longitudebonbonpris'];
                $lat1 = $bonbons[$i]['latitudebonbonpris'];
                $bonbons[$i]['adressepostale'] = $this->getAdresse($lat1, $lng1);
            } else {
                $lng1 = $bonbons[$i]['longitude'];
                $lat1 = $bonbons[$i]['latitude'];
            }

            $earth_radius = 6378137;   // Terre = sphère de 6378km de rayon
            $rlo1 = deg2rad($lng1);
            $rla1 = deg2rad($lat1);
            $rlo2 = deg2rad($coord[1]);
            $rla2 = deg2rad($coord[0]);
            $dlo = ($rlo2 - $rlo1) / 2;
            $dla = ($rla2 - $rla1) / 2;
            $a = (sin($dla) * sin($dla)) + cos($rla1) * cos($rla2) * (sin($dlo) * sin($dlo));
            $d = 2 * atan2(sqrt($a), sqrt(1 - $a));
            $distance= $earth_radius * $d;
            $bonbons[$i]['distance']=round($distance/1000,2);
        }

        return $this->twig->render('/bonbondex.html.twig', ['bonbons' => $bonbons]);
    }


    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bonbondexManager = new BonbondexManager($this->getPdo());
            $bonbondex = new Bonbondex();
            $bonbondex->setBonbonId($_POST['bonbon_id']);
            $bonbondex->setLatitude($_POST['latitude']);
            $bonbondex->setLongitude($_POST['longitude']);
            $id = $bonbondexManager->insert($bonbondex);
            header('Location:/bonbondex');
        }

        return $this->twig->render('/bonbondex.html.twig', ['bonbons' => $bonbons]);
        
    }

    public function getAdresse($latitude, $longitude)
    {
        $url = "https://api-adresse.data.gouv.fr/reverse/?lon=".$longitude."&lat=".$latitude;
        $json = file_get_contents($url);
        $json = json_decode($json);
        $adresse = 'cimetière :D';


        if (!empty($json)) {
            if (isset($json->features[0]->properties->label)) {
                $adresse = $json->features[0]->properties->label;
            }
        }

        return $adresse;
    }
}

