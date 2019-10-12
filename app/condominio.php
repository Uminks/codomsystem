<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Inmueble;

class Condominio extends Model
{
    protected $fillable = ['nombre'];

    public static function inmuebles ($id) {
        return Inmueble::join('condominios', 'condominios.id', '=', 'inmuebles.id_condomonio')->where('inmuebles.id_condomonio', (int) $id)->get();
    }
    
}
