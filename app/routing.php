<?php
// routing.php
$routes = [
    'Map' => [
        ['index', '/', 'GET'],
    ],

    'DataBase' => [
        ['fillInDataBase', '/database', 'GET'],
        ['affectAdresse', '/affectAdresse', 'GET'],
    ],

    'Option' => [
        ['showOption', '/option', 'GET'],
    ],
    'Joueur' => [
        ['add', '/addPlayer', ['GET', 'POST']],
        ['index', '/players', ['GET', 'POST']],
     ],

    'Bonbondex'=> [
        ['index', '/bonbondex', ['GET','POST']],
    ]

];
