<?php

namespace App\Http\Controllers\visitador;

use App\Http\Controllers\Controller;

use App\Models\Like;
use App\Models\Post;
use App\Models\Weather;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //INICIO DEL APLICATIVO
    //METODO __invoke : SE MANDA A LLAMAR AUTOMATICAMNETE
    public function __invoke()
    {
        $posts = Post::latest()->take(9)->get();

        $weather = Weather::Api();
        return view('visitador.home', [
            'posts' => $posts
            //  'like' => $like
        ]);
    }
}
