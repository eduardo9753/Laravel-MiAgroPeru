<?php

namespace App\Http\Controllers;

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
        /*CUANDO USAS ESTE METODO LO TIENES QUE RECORRER CON BUCLE FOREACH EN LA VISTA
        $ultimoPost = DB::select('SELECT 
        p.id AS "idPost",
        p.titulo AS "titulo",
        p.precio AS "precio",
        p.descripcion AS "descripcion",
        p.imagen AS "imagen",
        p.created_at AS "fechaRegistroPost",
        usu.id AS "idUsuario",
        usu.name AS "name",
        usu.username AS "username",
        usu.imagen AS "imagenUsuario",
        usu.celular as "celular",
        usu.created_at "fechaCreacionUsuario"
          
        FROM posts p 
        INNER JOIN users usu ON usu.id = p.user_id
        ORDER BY p.id DESC LIMIT 1');*/

        $ultimoPost = Post::select('*')->orderBy('id','desc')->first();

        //CUANDO USAS ELOQUENT SOLO PASAS LA VARIABLE FECHA Y DATOS($data->camapoTabla)
        //$posts = Post::find(DB::table('posts')->max('id'));
        //CONTANDO LOS LIKES EN FUNCION DEL ULTIMO POST REGISTRADO EN LA BD
        //$like = DB::table('likes')->where('post_id', optional($ultimoPost->id))->count();

       
        $weather = Weather::Api();
        return view('home', [
            'ultimoPost' => $ultimoPost
          //  'like' => $like
        ]);
    }
}
