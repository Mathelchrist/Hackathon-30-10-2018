<?php
// routing.php
$routes = [
    'Map' => [
        ['map', '/', 'GET'],
],
    'Option' => [
        ['showOption', '/option', 'GET'],
    ],
    'Joueur' => [
        ['add', '/addPlayer', ['GET', 'POST']],
        ['index', '/players', 'GET'],
    ],
];
