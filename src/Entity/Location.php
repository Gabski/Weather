<?php
namespace App\Entity;

class Location
{
    protected $city;
    protected $country;
    protected $description;
    protected $coordinates = [];
    protected $forecasts = [];

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry(string $country)
    {
        $this->country = $country;
        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity(string $city)
    {
        $this->city = $city;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getCoordinates()
    {
        return $this->coordinates;
    }

    public function setCoordinates($lat, $lon)
    {
        $this->coordinates = [
            'lat' => $lat,
            'lon' => $lon,
        ];
        return $this;
    }

    public function getForecasts()
    {
        return $this->forecasts;
    }

    public function addForecast(string $name, string $forecast)
    {
        if (!empty($this->coordinates)) {
            $newF = new $forecast($this);

            $this->forecasts[] = [
                'name' => $name,
                'data' => $newF->result(),
            ];
            return true;
        } else {
            return false;
        }
    }
}