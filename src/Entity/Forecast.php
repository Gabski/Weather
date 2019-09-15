<?php
namespace App\Entity;

class Forecast
{
    protected $temp = 0;
    protected $temp_min = 0;
    protected $temp_max = 0;
    protected $press = 0;

    public function result()
    {
        return [
            'temp' => $this->temp,
            'temp_min' => $this->temp_min,
            'temp_max' => $this->temp_max,
            'press' => $this->press,
        ];
    }

    public function setTemp($temp)
    {
        $this->temp = $temp;
        return $this;
    }

    public function setTempMax($temp_max)
    {
        $this->temp_max = $temp_max;
        return $this;
    }

    public function setTempMin($temp_min)
    {
        $this->temp_min = $temp_min;
        return $this;
    }

    public function setPress($press)
    {
        $this->press = $press;
        return $this;
    }

    public function getTemp()
    {
        return $this->temp;
    }

    public function getTempMax()
    {
        return $this->temp_max;
    }

    public function getTempMin()
    {
        return $this->temp_min;
    }

    public function getPress()
    {
        return $this->press;
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