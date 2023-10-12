<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Post;
use Carbon\Carbon;

class Posts extends Component
{
    public $posts;
    public $perPage = 2;

    public function mount()
    {
        $this->loadPosts();
    }

    public function loadPosts()
    {
        $ids = auth()->user()->followings->pluck('id')->toArray();

        // Traer las publicaciones de los usuarios a quienes sigues
        $followingsPosts = Post::whereIn('user_id', $ids)
            ->orderBy('created_at', 'desc')
            ->get();

        // Traer la última publicación del usuario autenticado
        $userPosts = Post::where('user_id', '=', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->take(1)
            ->get();

        // Combinar las dos colecciones y ordenarlas por fecha de creación
        $combinedPosts = $followingsPosts->merge($userPosts)->sortByDesc('created_at');

        // Tomar la cantidad necesaria según $this->perPage
        $this->posts = $combinedPosts->take($this->perPage);
    }

    public function loadMore()
    {
        $this->perPage += 2;
        $this->loadPosts();
    }

    public function render()
    {
        return view('livewire.posts');
    }
}
