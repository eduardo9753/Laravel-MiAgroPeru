<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Search extends Component
{
    //VARIABLE BUSCADOR
    public $search;

    public function render()
    {
        return view('livewire.search');
    }

    //traendo los datos con la busqueda del usuario
    public function getResultsProperty()
    {
        return Post::where('titulo', 'LIKE', '%' . $this->search . '%')
            ->take(10)->get();
    }
}
