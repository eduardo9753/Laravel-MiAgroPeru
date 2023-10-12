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
        $ultimoPost = Post::select('*')->orderBy('id', 'desc')->first();
        //CONTANDO LOS LIKES EN FUNCION DEL ULTIMO POST REGISTRADO EN LA BD
        //$like = DB::table('likes')->where('post_id', optional($ultimoPost->id))->count();

        $weather = Weather::Api();
        return view('visitador.home', [
            'ultimoPost' => $ultimoPost
            //  'like' => $like
        ]);
    }
}
