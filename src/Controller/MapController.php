<?php
/**
 * Created by PhpStorm.
 * User: wilder4
 * Date: 30/10/18
 * Time: 11:29
 */

namespace Controller;


class MapController extends AbstractController
{
    public function map()
    {
        return $this->twig->render('map.html.twig');
    }
}