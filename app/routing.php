<?php
// routing.php
$routes = [
    'DataBase' => [
        ['fillInDataBase', '/database', 'GET'],
    ]
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
