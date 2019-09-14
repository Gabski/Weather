<?php
namespace App\Entity;

class Location
{
    protected $city;
    protected $country;

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry(string $country)
    {
        $this->country = $country;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity(string $city)
    {
        $this->city = $city;
    }
}