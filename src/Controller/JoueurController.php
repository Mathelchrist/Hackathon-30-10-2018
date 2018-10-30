<?php
/**
 * Created by PhpStorm.
 * User: wilder6
 * Date: 30/10/18
 * Time: 16:02
 */

namespace Controller;


use Model\JoueurManager;
use Model\Joueur;

class JoueurController extends AbstractController
{

    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $joueurManager = new JoueurManager($this->getPdo());
            $joueur = new Joueur();
            $joueur->setNom($_POST['nom']);
            $joueurManager->insert($joueur);
            header('Location:/');
        }

        return $this->twig->render('Joueur/add.html.twig');
    }

    public function index()
    {
        $joueurManager = new JoueurManager($this->getPdo());
        $noms = $joueurManager->selectAll();

        return $this->twig->render('Joueur/joueur.html.twig', ['noms' => $noms]);
    }
}