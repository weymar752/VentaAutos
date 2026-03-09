<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ModeloVehiculo extends Model
{
    protected $table = 'modelos_vehiculo';
    protected $primaryKey = 'Id_Modelo';
    public $timestamps = true;

    protected $fillable = [
        'Marca_Vehiculo',
        'Nombre_Modelo',
    ];

    public function tipo(): BelongsTo
    {
        // tipos_vehiculo is keyed by Nombre_Modelo
        return $this->belongsTo(TipoVehiculo::class, 'Nombre_Modelo', 'Nombre_Modelo');
    }
}
