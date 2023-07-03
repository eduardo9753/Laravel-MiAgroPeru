<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BuscardorPostController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//PAGINA PRINCIPAL POR DEFECTO DONDE SE MUSTRA LOS SLAIDERS
//PAGINA PRINCIPAL POR DEFECTO Y QUE TIENE UN SOLO CONTROLADOR NO ES NECESARIO EL CONCHETE
Route::get('/', HomeController::class)->name('home');


//BLOG
Route::get('/blog/miagroperu', [BlogController::class , 'index'])->name('blog.index');


//RECUPERAR EMAIL(CON GMAIL)
Route::get('/mail', [MailController::class, 'index'])->name('mail.index');
Route::post('/mail/send', [MailController::class, 'send'])->name('mail.send');
//Route::get('/mail/recover/{user:password}', [MailController::class, 'recover'])->name('mail.recover');
Route::get('/mail/recover/password', [MailController::class, 'recover'])->name('mail.recover');
Route::post('/mail/update', [MailController::class, 'update'])->name('mail.update');


//BUSCADOR
Route::get('/buscador/post', [BuscardorPostController::class, 'search'])->name('post.search');


/**RUTA REGISTRO */
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);


/**LOGIN */
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);


/**CERRA SESSION */
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


/*MURO DE LAS PUBLICACIONES {"nombre del modelo /user/"} "plantilla dashboard"*/
/**EL MODELO User -->YA TIENE TODOS LOS CAMPOS DE LA BASE DE DATOS */
Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/post/publicaciones', [PostController::class, 'publicacion'])->name('posts.publicacion');
Route::get('/post/desarrollador', [PostController::class, 'desarrollador'])->name('posts.desarrollador');


/*COMENTARIOS*/
Route::post('/{username}/post/{id}', [ComentarioController::class, 'store'])->name('comentarios.store');
Route::get('/comentario/fetch/comentarios', [ComentarioController::class, 'fetchComentario'])->name('comentarios.fetch');
//Route::post('/{user:username}/posts/{post}', [ComentarioController::class, 'store'])->name('comentarios.store');


/*LIKES A LAS FOTOS*/
Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('posts.likes.store');
Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name('posts.likes.destroy');


/**PERFIL DEL USUARIO */
Route::get('/editar/perfil', [PerfilController::class, 'index'])->name('perfil.index');
Route::post('/editar/perfil', [PerfilController::class, 'store'])->name('perfil.store');


//SIGUIENDO A USUARIOS
Route::post('/{user:username}/follow', [FollowerController::class, 'store'])->name('users.follow');
Route::delete('/{user:username}/unfollow', [FollowerController::class, 'destroy'])->name('users.unfollow');
