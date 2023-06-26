<?php

namespace App\Http\Controllers;

use App\Mail\EnviarCorreo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //VISTA PARA MANDAR CORREO
    public function index()
    {
        return view('mail.index');
    }

    //ENVIANDO EL CORREO AL EMAIL PROPORCIONADO
    public function send(Request $request)
    {
        //VALIDACION
        $this->validate($request, [
            'email' => 'required|email'
        ]);

        $user = User::whereEmail($request->email)->first();

        if ($user) {
            Mail::to($request->email)->send(new EnviarCorreo($user));
            return back()->with('mensaje', 'Se envio un mensaje al correo proporcionado');
        } else {
            return back()->with('sin_correo', 'El correo proporcionado no existe en nuestra base de datos');
        }
    }

    //VISTA O LINK PARA RECUPERAR LA CONTRASEÑA
    public function recover()
    {
        /*return view('mail.recover',[
            'user' => $user
        ]);*/
        return view('mail.recover');
    }

    //ACTUALIZANDO LAS CREDENCIALES
    public function update(Request $request)
    {
        //VALIDACIONES DE LOS CAMPOS DEL FORMULARIO
        $this->validate($request, [
            'email' => 'required|email|max:60',
            'password' => 'required|confirmed|min:6',
        ]);

        //actualizamos los datos
        $user = User::whereEmail($request->email)->first();

        if ($user) {
            /*actualizamos datos*/
            $user->update([
                'password' => Hash::make($request->password)
            ]);
            return back()->with('mensaje', 'Se restablecio los datos correctamente');
        } else {
            return back()->with('mensaje', 'El correo proporcionado no existe');
        }
    }
}
