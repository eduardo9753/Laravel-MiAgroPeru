<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    //GUARDANDO COMENTARIO
    public function store(Request $request , User $user, Post $post)
    {
        //VALIDAR LOS CAMPOS
        $this->validate($request, [
          'comentario' => 'required|max:255'
        ]);

        
        //GUARDAR LOS DATOS "USUARIO QUE ESTA AUTENTICADO , ID DEL POTS QUE SE ESTA COMENTANTO Y EL COMENTARIO"
        Comentario::create([
           'user_id' => auth()->user()->id, //USUARIO QUE ESTA LOGIADO Y QUE VA COMENTAR
           'post_id' => $post->id,
           'comentario' => $request->comentario
        ]);

        //IMPRIMIR MENSAGE
        return back()->with('mensaje', 'Se agrego tu comentario :)');
    }
}
