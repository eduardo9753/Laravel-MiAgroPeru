<?php

namespace App\Http\Controllers\usuario\follower;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    //GUARDAR SEGUIR A USUARIO
    public function store(User $user)
    {
        $user->followers()->attach(auth()->user()->id);
        return back();
    }


    //DEJAR DE SEGUIR AL USUARIO
    public function destroy(User $user)
    {
        $user->followers()->detach(auth()->user()->id);
        return back();
    }

    //FUNCION QUE RETORNA A LOS USUARIOS QUE YO SIGO
    public function siguiendo(User $user)
    {
        //LISTA DE LOS QUE ESTOY SIGUIENDO
        $siguiendo = User::join('followers', 'followers.user_id', '=', 'users.id')
            ->select(
                'users.name',
                'users.username',
                'users.imagen',
                'users.created_at'
            )->where('followers.follower_id', '=', $user->id)->orderBy('users.id', 'desc')->simplePaginate(18);

        return view('usuario.follower.siguiendo.index', [
            'siguiendo' => $siguiendo,
            'user' => $user
        ]);
    }

    //FUNCION QUE RETORNA A LOS USURIOS QUE ME SIGUEN
    public function seguidor(User $user)
    {
        //DEL ID MANDADO EXTRAIGO EL ID DEL SEGUIDOR 
        //LO PASO COMO VARIABLE PARA PODER RECORRER LOS USUARIOS QUE ME SIGUEN
        $seguidores = User::join('followers', 'followers.user_id', '=', 'users.id')
            ->select(
                'users.name',
                'users.username',
                'users.imagen',
                'users.created_at',
                'followers.follower_id'
            )->where('followers.user_id', '=', $user->id)->orderBy('users.id', 'desc')->simplePaginate(18);

        //dd($seguidores);
        return view('usuario.follower.seguidor.index', [
            'seguidores' => $seguidores,
            'user' => $user
        ]);
    }
}
