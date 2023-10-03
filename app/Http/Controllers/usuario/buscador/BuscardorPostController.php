<?php

namespace App\Http\Controllers\usuario\buscador;

use App\Http\Controllers\Controller;

use App\Models\Post;
use Illuminate\Http\Request;

class BuscardorPostController extends Controller
{
    //BUSCADOR
    public function search(Request $request)
    {
        //CON ESTA SENTENCIA PODER ACCESDER A DATOS TIPO RECOMENDABLE PARA PAGINACION DE DATOS
        //$post->user->celular
        $posts = Post::select("*")->where('titulo', 'LIKE', '%' . $request->titulo . '%')->simplePaginate(12);

        return view('usuario.buscador.post.search', [
            'posts' => $posts,
        ]);
    }
}
