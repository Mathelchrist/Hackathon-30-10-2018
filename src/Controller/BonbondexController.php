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

        for ($i=0;$i<count($bonbons); $i++) {
            $lng1 = $bonbons[$i]['longitude'];
            $lat1 = $bonbons[$i]['latitude'];
            $earth_radius = 6378137;   // Terre = sphère de 6378km de rayon
            $rlo1 = deg2rad($lng1);
            $rla1 = deg2rad($lat1);
            $rlo2 = deg2rad(1.909251);
            $rla2 = deg2rad(47.902964);
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
            $bonbondex->setId($_POST['bonbon_id']);
            $id = $bonbondexManager->insert($bonbondex);
            header('Location:/bonbondex');
        }

        return $this->twig->render('bonbondex.html.twig');
    }

}

