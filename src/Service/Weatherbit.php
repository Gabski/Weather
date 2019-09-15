<?php
namespace App\Service;

use App\Interfaces\iWeatherApi;

class Weatherbit extends WeatherService implements iWeatherApi
{
    public function apiWork()
    {

        /* TODO
         * klucz API do configa
         * Wyjątki i błędy
         */

        $api = "0186d50929ae4634a78bf08f81ab97cc";
        $url = sprintf("https://api.weatherbit.io/v2.0/current?lat=%s&lon=%s&key=%s", $this->location->getCoordinates()['lat'], $this->location->getCoordinates()['lon'], $api);
        $opts = array('http' => array('header' => "User-Agent: GeoAddressScript 3.7.6\r\n"));
        $context = stream_context_create($opts);
        $response = file_get_contents($url, false, $context);
        $data = json_decode($response, true);

        $this->forecast
            ->setTemp($data['data'][0]['temp'])
            ->setPress($data['data'][0]['pres'])
            ->setTempMin($data['data'][0]['temp'])
            ->setTempMax($data['data'][0]['temp'])
        ;
    }

}