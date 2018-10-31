<?php
/**
 * Created by PhpStorm.
 * User: wilder6
 * Date: 30/10/18
 * Time: 16:02
 */

namespace Controller;


use Model\BonbondexManager;
use Model\JoueurManager;
use Model\Joueur;

class JoueurController extends AbstractController
{

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty(trim($_POST['nom']))) {
            $joueurManager = new JoueurManager($this->getPdo());
            $joueur = new Joueur();
            $joueur->setNom(trim($_POST['nom']));
            $joueurManager->insert($joueur);
            header('Location:/players');
            }
        }


        return $this->twig->render('Joueur/add.html.twig');
    }

    public function index()
    {
        $joueurManager = new JoueurManager($this->getPdo());
        $noms = $joueurManager->selectAll();


        if (isset($_POST['id'])){
        $_SESSION['id'] = $_POST['id'];
        $_SESSION['nom'] = $_POST['nom'];
        header('location:/');
        }

        return $this->twig->render('Joueur/joueur.html.twig', ['noms' => $noms]);
    }

    public function show(int $id)
    {
        $joueurManager = new JoueurManager($this->getPdo());
        $joueur = $joueurManager->selectOneById($id);

        return $this->twig->render('Joueur/hell.html.twig', ['noms' => $joueur]);
    }
    public function delete(int $id)
    {
        session_unset();
        session_destroy();
        $totoManager = new BonbondexManager($this->getPdo());
        $totoManager->delete($id);
        $joueurManager = new JoueurManager($this->getPdo());
        $joueurManager->delete($id);
        header('Location:/players');
    }



}