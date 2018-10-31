<?php
// routing.php
$routes = [
    'Map' => [
        ['index', '/', ['GET', 'POST']],
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
        ['delete', '/players/delete/{id:\d+}', 'GET'],

        ['show', '/players/{id:\d+}', 'GET'], // action, url, method

    ],

    'Bonbondex'=> [
        ['index', '/bonbondex', ['GET','POST']],

    ]

];
