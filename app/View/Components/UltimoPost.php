<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UltimoPost extends Component
{
    public $ultimoPost;
    public function __construct($ultimoPost)
    {
        $this->ultimoPost = $ultimoPost;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.ultimo-post');
    }
}
