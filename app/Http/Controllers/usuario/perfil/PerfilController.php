<?php

namespace App\Http\Controllers\usuario\perfil;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image; //AJUTE DE LAS FOTOS
use Illuminate\Support\Facades\File; //MAYORMENTE ES DE LOS ILUMINATE


class PerfilController extends Controller
{
    //AUTENTICACION PARA PROTEGER LAS RUTAS
    public function __construct()
    {
        $this->middleware('auth');
    }


    //VISTA FORMULARIO DEL PERFIL DE CADA USUARIO
    public function index()
    {
        return view('usuario.perfil.index');
    }


    //METODO PARA ACTUALIZAR LOS DATOS DEL PERFIL
    public function store(Request $request)
    {
        //MODIFICANDO EL USERNAME QUE SEA UNICO
        $request->request->add(['username' => Str::slug($request->username)]); //PONER EN MINUSCULA Y LOS ESPACION LO RELLENA CON "-"

        $this->validate($request, [
            'username' => ['required', 'unique:users,username,' . auth()->user()->id, 'min:5', 'max:15', 'not_in:twitter,editar-pefil'] //NOMBRE DE LA TABLA
        ]);

        //VALIDAMOS LA IMAGEN QUE VIENEN DEL FORMULARIO
        if ($request->imagen) {
            //ELIMINANDO LA IMAGEN ANTERIOR DEL USUARIO SI TUVIERA
            $user = DB::table('users')->where('id', auth()->user()->id)->first();
            if ($user->imagen) { //VALIDANDO SI TIENE IMAGEN EN LA BASE DE DATOS
                $imagen_path = public_path('perfiles/' . $user->imagen); //BUSCANDO LA IMAGEN
                if (File::exists($imagen_path)) {  //VALIDANDO SI EXISTE EN LA CARPETA
                    unlink($imagen_path);  //ELIMINANDO LA IMAGEN DEL SERVIDOR
                }
            }

            $imagen = $request->file('imagen'); //NOMBRE DEL INPUT

            $nombreImagen = Str::uuid() . "." . $imagen->extension(); //DANDOLE UN ID UNICO A LA IMAGEN

            $imagenServidor = Image::make($imagen); //CREANDO LA IMAGEN CON Intervation
            $imagenServidor->fit(400, 400);       //DANDOLE TAMAÑO UNICO

            $imagenPath = public_path('perfiles') . "/" . $nombreImagen; //DIRECCIONANDO A LA RUTA
            $imagenServidor->save($imagenPath);      //GUARDANDO IMAGEN


        } else {
            $user = DB::table('users')->where('id', auth()->user()->id)->first();
            $nombreImagen = $user->imagen;
        }

        //GUARDAMOS CAMBIOS
        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->celular = $request->celular;
        $usuario->imagen = $nombreImagen;
        $usuario->save();

        //REDIRECCIONAR AL USUARIO A SU MURO
        return redirect()->route('posts.index', $usuario->username);
    }
}
