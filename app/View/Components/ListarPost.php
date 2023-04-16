<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ListarPost extends Component
{
    //CREANDO LA VARIABLE
    public $posts;

    //IMPORTANTE DEBEMOS DE PASAR EL MISMO NOMBRE DE LA VARIABLE QUE ESTA EN EL CONTROLADOR Y EN EL COMPONENTE
    public function __construct($posts)
    {
        //OBTENER INFORMACION QUE SE VA MOSTRAR EN EL TEMPLATE
        $this->posts = $posts; 
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.listar-post');
    }
}
