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

class CondominioController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Listar Condominios
    public function getComdominios(){
        $user_id = Auth::user()->id;
        $data = User::getCondominios($user_id);

        return $data;
    }
    

    public function getInmuebles ($id) {
        $data = Condominio::inmuebles ($id); 

        return $data;
    }

    public function getProveedores ($id) {
        $data = Condominio::proveedores ($id); 

        return $data;
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
            $percent = (float) $inmueble["percentage"];
            $title = (string) $inmueble["title"];

            $inmueble = new Inmueble();
            $inmueble->alicuota = $percent;
            $inmueble->nombre = $title;

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
                "descripcion" => $proveedor["name"],
                "id_condominio" => $condominio->id
            ]);
        }
        
        return view('home');
    }

}
