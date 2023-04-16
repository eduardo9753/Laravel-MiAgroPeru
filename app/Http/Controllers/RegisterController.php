<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //VISTA DEL FORMULARIO PARA EL REGISTRO
    public function index()
    {
        return view('auth.register');
    }

    //PARA RECOLECTAR LA INFORMACION MANDADA DEL FORMULARIO DE REGISTRO
    public function store(Request $request)
    {
        //MODIFICANDO EL USERNAME QUE SEA UNICO
        $request->request->add(['username' => Str::slug($request->username)]); //PONER EN MINUSCULA Y LOS ESPACION LO RELLENA CON "-"


        //VALIDACIONES DE LOS CAMPOS DEL FORMULARIO
        $this->validate($request, [
            'name' => 'required|min:5|max:15',
            'username' => 'required|unique:users|min:5|max:15', //NOMBRE DE LA TABLA
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6',
            'celular' => 'required|max:12'
        ]);

        //IMPORTANDO CLASE Y CREANDO NUEVO REGISTRO EN LA BASE DE DATOS
        User::create([
            //CAMPOS DE LA BASE DE DATOS
            'name' => $request->name,
            'username' => $request->username, 
            'email' => $request->email,
            'password' => Hash::make($request->password), //ENCRIPTAR LAS CONTRASEÑAS
            'celular' => $request->celular
        ]);

        //AUTENTICANDO EL USUARIO
        auth()->attempt([
           'email' => $request->email,
           'password' => $request->password
        ]);

        //OTRA FORMA DE AUTENTICAR
        //auth()->attempt($request->only('email','password'));


        //REDIRECCIONAR AL USUARIO A SU MURO
        return redirect()->route('posts.index' , auth()->user()->username);
    }
}
