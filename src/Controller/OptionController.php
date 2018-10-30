<?php
/**
 * Created by PhpStorm.
 * User: wilder6
 * Date: 30/10/18
 * Time: 11:31
 */

namespace Controller;

use Twig_Loader_Filesystem;
use Twig_Environment;

class OptionController extends AbstractController
{
    public function showOption()
    {
        $toto = session_start();
        if(!($_SESSION['id'])) {
            header('location: /players');
            exit();
        }
        return $this->twig->render('Option/item.html.twig', ['toto' => $toto]);
    }
}