<?php
namespace App\Entity;

class Location
{
    protected $city;
    protected $country;
    protected $description;
    protected $coordinates = [0, 0];

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
}