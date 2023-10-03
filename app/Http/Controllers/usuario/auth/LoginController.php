<?php

namespace App\Http\Controllers\usuario\auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //VISTA LOGIN
    public function index()
    {
        return view('usuario.auth.login');
    }

    //AUTENTICACION DEL USUARIO
    public function store(Request $request)
    {
        //VALIDACIONES DE LOS CAMPOS DEL FORMULARIO
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);


        //COMPROBANDO SI LAS CREDENCIALES SON CORRECTAS O INCORRECTAS
        //CON LA BASE DE DATOS E IMPRIMIMOS EL MENSAJE 
        //EN LA VISTA "login"
        //$request->remenber : RECORDAR SESSION
        if (!auth()->attempt($request->only('email', 'password'), $request->remenber)) {
            return back()->with('mensaje', 'Tus Credenciales estan Incorrectas');
        }

        //REDIRECCIONAMOS AL MURO Y PASANDO LA VARIABLE USUARIO
        return redirect()->route('posts.index', auth()->user()->username);
    }
}
