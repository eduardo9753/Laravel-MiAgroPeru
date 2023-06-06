<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Weather extends Component
{
    
    public $imagen;
    public $celcius;
    public $descripcion;
    public $fahrenheit;

    public function __construct($imagen,$celcius,$descripcion,$fahrenheit)
    {
        //INICIALIZACION DE VARIABLES
        $this->imagen = $imagen;
        $this->celcius = $celcius;
        $this->descripcion = $descripcion;
        $this->fahrenheit = $fahrenheit;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.weather');
    }
}
