<?php
namespace App\Service;

use App\Entity\Forecast;
use App\Entity\Location;

abstract class WeatherService
{
    protected $forecast;
    protected $location;

    public function __construct(Location $location)
    {
        $this->forecast = new Forecast($location);
        $this->location = $location;
        $this->apiWork();
    }

    protected function apiWork()
    {}

    public function result()
    {
        return $this->forecast;
    }

}