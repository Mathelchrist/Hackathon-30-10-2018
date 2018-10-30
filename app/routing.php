<?php
// routing.php
$routes = [
    'Item' => [ // Controller
        ['index', '/', 'GET'], // action, url, method
        ['show', '/item/{id:\d+}', 'GET'], // action, url, method
        ['add', '/item/add', ['GET', 'POST']], // action, url, method
        ['edit', '/item/edit/{id:\d+}', ['GET', 'POST']], // action, url, method
        ['delete', '/item/delete/{id:\d+}', 'GET'],
    ],
    'Category' => [
        ['indexCategory', '/category', 'GET'],
        ['showCategory', '/category/{id}', 'GET'],
    ],
    'Option' => [
        ['showOption', '/option', 'GET'],
    ]

];
