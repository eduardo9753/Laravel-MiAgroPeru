<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    //LO BUENO DE LOS COMPONENTES DE LIVEWIRE QUE LOS DATOS YA ESTAN DISPONIBLES EN LA VISTA 
    //NO ES NECESARIO PASARLO COMO PARAMETRO EN EL METODO
    public $post;
    public $isLiked;
    public $likes;


    //FUNCION QUE SE EJECURA AUTOMATICAMENTE ES COMO UN "constructor"
    public function mount($post)
    {
        $this->post = $post;
        $this->isLiked = $post->checkLike(auth()->user());
        $this->likes =  $post->likes->count(); //DE LA RELACION CONTAMOS LOS LIKES DE ESA PUBLICACION"POST"
    }

    public function like()
    {
        if ($this->post->checkLike(auth()->user())) {
            //ELIMINANDO LOS LIKES
            $this->post->likes()->where('post_id', $this->post->id)->delete();
            $this->isLiked = false;
            $this->likes--;
        } else {
            //GUARDAMOS LOS DATOS CON LA RELACION QUE SE CREO EN EL MODELO "Post" 
            $this->post->likes()->create([
                'user_id' => auth()->user()->id
            ]);
            $this->isLiked = true;
            $this->likes++;
        }
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
