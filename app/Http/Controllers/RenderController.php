<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RenderController extends Controller
{


    public function getLogin() {
        return view('login');
    }

    
}
