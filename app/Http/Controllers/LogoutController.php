<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //CERRANDO SESSION
    public function store()
    {
       auth()->logout();

       return redirect()->route('login');
    }
}
