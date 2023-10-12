<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Post;

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
        $this->posts = Post::latest()->take($this->perPage)->get();
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

