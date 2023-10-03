<?php

namespace App\Http\Controllers\visitador;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    //VISTA DE LAS NOTICAS Y VIDEO
    public function index()
    {
        return view('visitador.blog.index');
    }
}
