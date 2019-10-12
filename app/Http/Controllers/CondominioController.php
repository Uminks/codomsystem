<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Storage;
use DB;
use App\Condominio;
use App\Inmueble;
use App\Monto_Reserva;
use App\Proveedor;
use App\User;
use \Auth;
use Illuminate\Support\Facades\Input;
use Image;

class CondominioController extends Controller
{
    
    //Listar Condominios
    public function getComdominios(){
        $user_id = Auth::user()->id;
        $data = User::getCondominios($user_id);

        return view('crud',compact('data'));
    }
    

    public function getInmuebles ($id) {
        $data = Condominio::inmuebles ($id); 

        return view ('crud', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $data)
    {

        $user_id = Auth::user()->id;
        //Crear condominio
        $condominio = new Condominio();
        $condominio->nombre = $data["codom_name"];
        $condominio->save();
        
        DB::insert('INSERT INTO monto_reservas (id_condominio, cuota, status) values (?, ?, ?)', [$condominio->id, $data["reserve_amount"], 0]);
        DB::insert('INSERT INTO user_condominio (id_usuario, id_condominio) VALUES (?, ?)', [$user_id, $condominio->id]);

        //Crear Inmueble
        foreach ( $data["estates"] as $inmueble ) {
            echo $inmueble["image"];
            $inmueble = new Inmueble();
            $inmueble->alicuota = (float) $inmueble["percentage"];

            $image = substr($data["estates"][0]["image"], strpos($data["estates"][0]["image"], ",")+1);;  // your base64 encoded
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = str_random(100).'.'.'png';
            \File::put(storage_path(). '/' . $imageName, base64_decode($image));

            $inmueble->imagen = $imageName;
            $inmueble->id_condomonio = $condominio->id;
            $inmueble->save();
        }
        
        foreach ( $data["providers"] as $proveedor ){
            Proveedor::create([
                "descripcion" => $proveedor["name"]
            ]);
        }
        
        return view('home');
    }

}
