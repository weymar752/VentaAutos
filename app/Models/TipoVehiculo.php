<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoVehiculo extends Model
{
    protected $table = 'tipos_vehiculo';
    protected $primaryKey = 'Nombre_Modelo';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;

    protected $fillable = [
        'Nombre_Modelo',
        'Tipo_de_Vehiculo',
    ];
}
