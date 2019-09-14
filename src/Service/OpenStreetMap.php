<?php
namespace App\Service;

use App\Entity\Location;

class OpenStreetMap
{
    public function find(Location $location)
    {
        $url = sprintf("https://nominatim.openstreetmap.org/search?format=json&limit=1&q=%s,%s", $location->getCity(), $location->getCountry());
        $opts = array('http' => array('header' => "User-Agent: GeoAddressScript 3.7.6\r\n"));
        $context = stream_context_create($opts);
        $response = file_get_contents($url, false, $context);
        $data = json_decode($response, true);

        if (!empty($data)) {

            $location
                ->setDescription($data[0]['display_name'])
                ->setCoordinates($data[0]['lat'], $data[0]['lon']);

        }

        return $location;
    }

}