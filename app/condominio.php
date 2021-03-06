<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Inmueble;
use App\Proveedor;

class Condominio extends Model
{
    protected $fillable = ['nombre'];

    public static function inmuebles ($id) {
        return Inmueble::select('inmuebles.*')->join('condominios', 'condominios.id', '=', 'inmuebles.id_condomonio')->where('inmuebles.id_condomonio', (int) $id)->get();
    }
    
    public static function proveedores ($id) {
        return Proveedor::select('proveedors.*')->join('condominios', 'condominios.id', '=', 'proveedors.id_condominio')->where('proveedors.id_condominio', (int) $id)->get();
    }
}
