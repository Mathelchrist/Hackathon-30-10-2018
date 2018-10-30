<?php
// routing.php
$routes = [
    'Map' => [
        ['index', '/', 'GET'],
    ],

    'DataBase' => [
        ['fillInDataBase', '/database', 'GET'],
    ],


    'Option' => [
        ['showOption', '/option', 'GET'],
    ],

    'Category' => [
        ['indexCategory', '/category', 'GET'],
        ['showCategory', '/category/{id}', 'GET'],
    ],
    'Bonbondex'=> [
        ['index', '/bonbondex', ['GET','POST']],
    ]

];
