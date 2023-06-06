@php
use App\Models\Weather;
$weather = Weather::Api(); 
$celcius = $weather['T_Celcius'];
$fahrenheit = $weather['T_Fahrenheit'];
$descripcion = $weather['Descripcion'];
$imagen = $weather['Imagen'];
@endphp

<x-weather  :imagen="$imagen" :celcius="$celcius" :descripcion="$descripcion" :fahrenheit="$fahrenheit"/>