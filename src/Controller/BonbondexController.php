<?php
namespace Controller;

use Model\Item;
use Model\ItemManager;

class BonbondexController extends AbstractController
{
    public function index()
    {
        $itemManager = new ItemManager($this->getPdo());
        $items = $itemManager->selectAll();

        return $this->twig->render('/bonbondex.html.twig', ['items' => $items]);
    }

}

