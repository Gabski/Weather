<?php
namespace App\Service;

use App\Entity\Location;

class OpenWeatherMap
{
    public function weather(Location $location)
    {
        $api = "c61088b41391e802c312cd719e05150c";
        $url = sprintf("https://api.openweathermap.org/data/2.5/weather?lat=%s&lon=%s&appid=%s", $location->getCoordinates()['lat'], $location->getCoordinates()['lon'], $api);
        $opts = array('http' => array('header' => "User-Agent: GeoAddressScript 3.7.6\r\n"));
        $context = stream_context_create($opts);
        $response = file_get_contents($url, false, $context);
        $data = json_decode($response, true);
        var_dump($data);
    }

}