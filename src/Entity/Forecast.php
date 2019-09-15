<?php
namespace App\Entity;

abstract class Forecast
{
    protected $temp = 0;
    protected $temp_min = 0;
    protected $temp_max = 0;

    public function result()
    {
        return [
            'temp' => $this->temp,
            'temp_min' => $this->temp_min,
            'temp_max' => $this->temp_max,
        ];
    }

    public static function FahrenheitToCelsius($fahrenheit)
    {
        return ($fahrenheit - 32) / 1.8;
    }

    public static function KelvinToCelsius($kelvin)
    {
        return ($kelvin - 273.15);
    }

}