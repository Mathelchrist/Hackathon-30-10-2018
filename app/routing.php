<?php
// routing.php
$routes = [
    'Item' => [ // Controller
        ['index', '/', 'GET'], // action, url, HTTP method
        ['show', '/item/{id}', 'GET'], // action, url, HTTP method

    ],
    'Category' => [
        ['indexCategory', '/category', 'GET'],
        ['showCategory', '/category/{id}', 'GET']
    ]

];
