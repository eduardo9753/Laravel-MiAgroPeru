<?php

namespace App\Http\Controllers\usuario\post;

use App\Http\Controllers\Controller;

use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; //MAYORMENTE ES DE LOS ILUMINATE
use Intervention\Image\Facades\Image; //AJUTE DE LAS FOTOS


class PostController extends Controller
{
    //PROTEGIENDO EL MURO PARA LOS USUARIOS NO AUTENTICADOS
    public function __construct()
    {
        //SOLO LOS METODOS 'show' AND 'index' SERAS VISIBLES SIN AUTENTICACION
        $this->middleware('auth')->except(['show','index']);
    }

    //VISTA DEL MURO DEL USUARIO DONDE ESTAN SUS PUBLICACIONES Y LE PASAMOS LA CLASE USUARIO
    public function index(User $user)
    {
        //TRAENDO LAS PUBLICACIONES DESDE LAS MAS NUEVAS
        $posts = Post::where('user_id', $user->id)->orderBy('created_at','desc')->paginate(4);

        //PASANDO LA VARIABLE A LA VISTA 
        return view('usuario.posts.dashboard', [
            'user' => $user,
            'posts' => $posts
        ]);
    }


    //VISTA DEL FORMULARIO PARA CREAR UNA PUBLICACION
    public function create()
    {
        //CONSULTA DIRECTA A LA BASE DE DATOS
        $user = DB::table('users')->where('id', auth()->user()->id)->first();

        return view('usuario.posts.create', [
            'user' => $user
        ]);
    }


    //FUNCION PARA GUARDAR LA PUBLICACION
    public function store(Request $request)
    {
        //VALIDAMOS LOS CAMPOS CON VALIDATE
        $this->validate($request, [
            'titulo' => 'required|max:50',
            'precio' => 'required',
            'descripcion' => 'required',
            'file' => 'required'
        ]);

        //VALIDAMOS LA IMAGEN QUE VIENEN DEL FORMULARIO
        if ($request->file) {
            $imagen = $request->file('file'); //NOMBRE DEL INPUT

            $nombreImagen = Str::uuid() . "." . $imagen->extension(); //DANDOLE UN ID UNICO A LA IMAGEN

            $imagenServidor = Image::make($imagen); //CREANDO LA IMAGEN CON Intervation
            $imagenServidor->fit(400, 400);       //DANDOLE TAMAÑO UNICO

            $imagenPath = public_path('uploads') . "/" . $nombreImagen; //DIRECCIONANDO A LA RUTA
            $imagenServidor->save($imagenPath);      //GUARDANDO IMAGEN
        }

        /*GUARDANDO LOS DATOS EN LA BASE DE DATOS (1 FORMA)*/
        Post::create([
            'titulo' => $request->titulo,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
            'imagen' => $nombreImagen,
            'user_id' => auth()->user()->id
        ]);

        /*GUARDANDO LOS DATOS EN LA BASE DE DATOS (2 FORMA)
        $post = new Post;
        $post->titulo = $request->titulo;
        $post->precio = $request->precio;
        $post->descripcion = $request->descripcion;
        $post->imagen = $nombreImagen;
        $post->user_id = auth()->user()->id;
        $post->save();*/

        /*GUARDANDO LOS DATOS EN LA BASE DE DATOS (3 FORMA)
        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
            'imagen' => $nombreImagen,
            'user_id' => auth()->user()->id
        ]);*/


        //REDIRECCIONAMOS AL MURO Y PASANDO LA VARIABLE USUARIO
        return redirect()->route('posts.index', auth()->user()->username);
    }


    //MOSTRAR UNA PUBLICACION QUE HEMOS SUBIDO
    public function show(User $user , Post $post)
    {
        //CONSULTA DIRECTA A LA BASE DE DATOS
        //$user = DB::table('users')->where('id', auth()->user()->id)->first();
        //$user = DB::table('users')->where('id', $user->id)->first();

       
        return view('usuario.posts.show', [
            'post' => $post,
            'user' => $user
        ]);
    }

    //METODO PARA ELIMINAR UNA PUBLICACION
    public function destroy(Post $post)
    {
        //VERIFICANDO QUE SEA LA MISMA PERSONA QUIEN ESTA A PUNTO DE ELIMINAR SU PUBLICACION
        //if($post->user_id === auth()->user()->id){ 
        //}

        //USANDO POLICIES
        $this->authorize('delete', $post);
        $post->delete();

        //ELIMINAR IMAGEN
        $imagen_path = public_path('uploads/'.$post->imagen);
        if(File::exists($imagen_path)){
           unlink($imagen_path);
        }

        //RETORNAMOS AL MURO
        return redirect()->route('posts.index', auth()->user()->username);
    }


    //PUBLICACIONES DE MIS SEGUIDORES
    public function publicacion()
    {
        //OBTENER EL ID DE LOS USUARIOS QUIENES A SEGUIMOS
        $ids  = auth()->user()->followings->pluck('id')->toArray();

        //TRAENDO LOS DATOS DE ORDEN DESC Y DE CADA MES  "la mas nuevas"
        $inicioMes = Carbon::now()->startOfMonth();
        $inicioFormateado = $inicioMes->format('Y-m-d H:i:s');
        $posts = Post::whereIn('user_id', $ids)->where('created_at','>=',$inicioFormateado)->orderBy('created_at','desc')->simplePaginate(20);

        //TRAENDO 3 USUARIO DE FORMA ALEATORIA
        $users = User::inRandomOrder()->limit(4)->get();

        return view('usuario.posts.publicaciones', [
           'posts' => $posts,
           'users' => $users
        ]);
    }

    //VISTA DESARROLALDOR 
    public function desarrollador()
    {
        return view('usuario.posts.dev');
    }
}
