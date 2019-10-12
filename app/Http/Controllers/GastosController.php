<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GastosController extends Controller
{
    //Listar Proveedores
    public function getProveedores(){
        $user_id = Auth::user()->id;
        $data = User::getCondominios($user_id);

        return $data;
    }
}
