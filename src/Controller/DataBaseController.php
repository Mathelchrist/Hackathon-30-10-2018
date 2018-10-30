<?php

namespace Controller;

use GuzzleHttp\Client;
use Model\Candy;
use Model\CandyManager;

class DataBaseController extends AbstractController
{
    private $uri = 'https://fr.openfoodfacts.org/cgi/search.pl';
    private $search = 'bonbons';

    public function fillInDataBase()
    {
        // Create a client with a base URI
        $client = new Client();

        $response = $client->request('GET', $this->uri, [
            'query' => [
                    'search_terms' => $this->search,
                    'country' => 'France',
                    'search_simple' => 1,
                    'page_size' => 75,
                    'json' => 1
                    ]
            ]);

        $body = $response->getBody();
        $json = json_decode($body->getContents(), true);

        if (!empty($json)) {
            $candyManager = new CandyManager($this->getPdo());

            foreach ($json['products'] as $product) {
                $candy = new Candy();

                $candy->setCodeBarre($product['code']);
                $candy->setNom(ucwords(strtolower($product['product_name_fr'])));
                $candy->setImageUrl($product['image_front_small_url']);
                $candy->setCategorieId(1);

                $lastId = $candyManager->addCandy($candy);
                if ($lastId > 0) {
                    $candyManager->affectAddress($lastId);
                }
            }
        }
    }
}
