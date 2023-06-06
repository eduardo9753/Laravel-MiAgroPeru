<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    use HasFactory;


    public static function Api()
    {
        $API_KEY = "b45ee9e53ac46cac0c24a3d0c3461f0c";
        $ciudad = "Lima";
        $lang = "es";
        $URI_API = "https://api.openweathermap.org/data/2.5/weather?q=$ciudad&appid=$API_KEY&lang=$lang";

        $weather_date = json_decode(file_get_contents($URI_API), true);
        $temperatura_in_celcius = $weather_date['main']['temp'] - 273.15;
        $temperatura_in_fahrenheit = ($temperatura_in_celcius * (9 / 5)) + 32;
        $descripcion = $weather_date['weather'][0]['description'];
        $celcius =  round($temperatura_in_celcius);
        $fahrenheit = round($temperatura_in_fahrenheit);
        $img =  $weather_date['weather'][0]['icon'];
        $IMG_API = "http://openweathermap.org/img/wn/$img@2x.png";
        $datos = array();

        $datos = [
            "T_Celcius"     => $celcius,
            "T_Fahrenheit"  => $fahrenheit,
            "Descripcion"   => $descripcion,
            "Imagen"        => $IMG_API
        ];
        return $datos;
    }
}
