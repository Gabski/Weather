<?php
namespace App\Entity;

class OpenWeatherMap extends Forecast
{
    public function __construct(Location $location)
    {
        $api = "c61088b41391e802c312cd719e05150c";
        $url = sprintf("https://api.openweathermap.org/data/2.5/weather?lat=%s&lon=%s&appid=%s", $location->getCoordinates()['lat'], $location->getCoordinates()['lon'], $api);
        $opts = array('http' => array('header' => "User-Agent: GeoAddressScript 3.7.6\r\n"));
        $context = stream_context_create($opts);
        $response = file_get_contents($url, false, $context);
        $data = json_decode($response, true);
        $this->temp = self::KelvinToCelsius($data['main']['temp']);
        $this->temp_min = self::KelvinToCelsius($data['main']['temp_min']);
        $this->temp_max = self::KelvinToCelsius($data['main']['temp_max']);
    }

}