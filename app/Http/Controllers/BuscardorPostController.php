<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BuscardorPostController extends Controller
{
    //BUSCADOR
    public function search(Request $request)
    {
        //CON ESTA SENTENCIA PODER ACCESDER A DATOS TIPO
        //$post->user->celular
        //$posts = Post::select("*")->where('titulo', 'LIKE', '%' . $request->titulo . '%')->simplePaginate(12);
        
        
        //CON ESTA SENTENCIA NO ES NECESARIO PORQUE CON EL INMNER JOIN YA TIENES LOS DATOS DISPONIBLES 
        $posts = Post::join('users', 'users.id', '=', 'posts.user_id')
        ->select(
            'posts.id',
            'posts.titulo',
            'posts.precio',
            'posts.descripcion',
            'posts.imagen',
            'posts.created_at',
            'users.celular',
            'users.name',
            'users.id',
            'users.username'           //LE PASAMOS EL ID DEL FORMULARIO DE BUSQUEDA
        )->where('posts.titulo', '=', $request->titulo)->orderBy('posts.titulo','desc')->simplePaginate(9);
        return view('buscador.post.search', [
            'posts' => $posts,
        ]);
    }
}
