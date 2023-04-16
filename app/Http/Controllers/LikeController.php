<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //GUARDANDO LOS LIKES
    public function store(Request $request , Post $post) 
    {
        //GUARDAMOS LOS DATOS CON LA RELACION QUE SE CREO EN EL MODELO "Post" 
        $post->likes()->create([
           'user_id' => $request->user()->id
        ]);

        return back();
    }


    //ELIMINANDO LOS LIKES
    public function destroy(Request $request , Post $post)
    {
        $request->user()->likes()->where('post_id', $post->id)->delete();

        return back();
    }
}
