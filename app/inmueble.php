<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Condominio;

class Inmueble extends Model
{
    protected $fillable = ['id', 'id_condominio', 'alicuota', 'imagen', 'nombre'];

}
