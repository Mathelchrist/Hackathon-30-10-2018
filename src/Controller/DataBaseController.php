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

            }
        }
    }


    /**
     * GPS du client
     * @param $latitude
     * @param $longitude
     */
    public function affectAdresse()
    {
        $longitudeClient = 1.909251;
        $latitudeClient = 47.902964;
        $rayonEnKm = 3;

        $candyManager = new CandyManager($this->getPdo());
        $candies = $candyManager->selectAll();

        // DROP TABLE ADRESSE
        $candyManager->truncateAdresse();

        foreach($candies as $candy) {
            $id = $candy->getId();
            $gps = $this->generate_random_point([$latitudeClient, $longitudeClient], $rayonEnKm);
            $latitude = $gps[0];
            $longitude = $gps[1];
            $candyManager->affectAddress($id, $latitude, $longitude);
        }

        header('Location: /bonbondex');
    }

    /**
     * Donne un point GPS aléatoire entre le point donnée et un rayon
     * @param $centre
     * @param $radius
     * @return array
     */
    public function generate_random_point($centre, $radius){

        $radius_earth = 3959; //miles

        //Pick random distance within $distance;
        $distance = lcg_value()*$radius;

        //Convert degrees to radians.
        $centre_rads = array_map( 'deg2rad', $centre );

        //First suppose our point is the north pole.
        //Find a random point $distance miles away
        $lat_rads = (pi()/2) -  $distance/$radius_earth;
        $lng_rads = lcg_value()*2*pi();


        //($lat_rads,$lng_rads) is a point on the circle which is
        //$distance miles from the north pole. Convert to Cartesian
        $x1 = cos( $lat_rads ) * sin( $lng_rads );
        $y1 = cos( $lat_rads ) * cos( $lng_rads );
        $z1 = sin( $lat_rads );


        //Rotate that sphere so that the north pole is now at $centre.

        //Rotate in x axis by $rot = (pi()/2) - $centre_rads[0];
        $rot = (pi()/2) - $centre_rads[0];
        $x2 = $x1;
        $y2 = $y1 * cos( $rot ) + $z1 * sin( $rot );
        $z2 = -$y1 * sin( $rot ) + $z1 * cos( $rot );

        //Rotate in z axis by $rot = $centre_rads[1]
        $rot = $centre_rads[1];
        $x3 = $x2 * cos( $rot ) + $y2 * sin( $rot );
        $y3 = -$x2 * sin( $rot ) + $y2 * cos( $rot );
        $z3 = $z2;


        //Finally convert this point to polar co-ords
        $lng_rads = atan2( $x3, $y3 );
        $lat_rads = asin( $z3 );

        return array_map( 'rad2deg', array( $lat_rads, $lng_rads ) );
    }
}