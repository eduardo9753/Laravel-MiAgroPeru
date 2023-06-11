<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ComentarioController extends Controller
{

  //METODO AJAX
  public function store(Request $request)
  {
    $username = $request->username;
    $post_id = $request->id;

    $validator = Validator::make($request->all(), [
      'comentario' => 'required|string'
    ]);

    if ($validator->fails()) {
      return response()->json([
        'code' => 0,
        'error' => $validator->errors()->toArray()
      ]);
    } else {
      //GUARDAR LOS DATOS "USUARIO QUE ESTA AUTENTICADO , ID DEL POTS QUE SE ESTA COMENTANTO Y EL COMENTARIO"
      $save = Comentario::create([
        'user_id' => auth()->user()->id, //USUARIO QUE ESTA LOGIADO Y QUE VA COMENTAR
        'post_id' => $post_id,
        'comentario' => $request->comentario
      ]);

      if ($save) {
        return response()->json([
          'code' => 1,
          'msg' => 'Comentario Agregado'
        ]);
      }
    }
  }

  //TRAENDO DATOS A LA TABLA
  public function fetchComentario(Request $request)
  {
    //traendo los post
    $post = DB::select('SELECT 
    u.imagen AS "imagen",
    u.username AS "username",
    co.created_at AS "created_at",
    co.comentario AS "comentario"
    FROM comentarios co
    INNER JOIN users u ON u.id = co.user_id
    INNER JOIN posts p ON p.id = co.post_id
    WHERE p.id =?', [$request->id_post]);

    $data = view('posts.all-comentario', [
      'post' => $post
    ])->render();

    //retornando los datos por ajax
    return response()->json([
      'code' => 1,
      'result' => $data
    ]);
  }

  /*GUARDANDO COMENTARIO
    public function store(Request $request , User $user, Post $post)
    {
        /*VALIDAR LOS CAMPOS
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
    }*/
}
