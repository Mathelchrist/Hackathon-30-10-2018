<?php
// chargement de l'autoload en début de fichier
require __DIR__ . '/../vendor/autoload.php';
//...

$connexion = new \Controller\ItemController();
$connexion->index();



?>

