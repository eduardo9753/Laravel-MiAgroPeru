<?php

namespace App\Http\Controllers;

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
}