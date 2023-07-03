<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    //VISTA DE LAS NOTICAS Y VIDEO
    public function index()
    {
        return view('blog.index');
    }
}
