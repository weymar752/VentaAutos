<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehiculo extends Model
{
    protected $table = 'vehiculos';
    protected $primaryKey = 'Id_Vehiculo';
    public $timestamps = true;

    protected $fillable = [
        'AnioVehiculo',
        'Id_Modelo',
        'Id_Vendedor',
    ];

    public function modelo(): BelongsTo
    {
        return $this->belongsTo(ModeloVehiculo::class, 'Id_Modelo', 'Id_Modelo');
    }

    public function vendedor(): BelongsTo
    {
        return $this->belongsTo(Vendedor::class, 'Id_Vendedor', 'Id_Vendedor');
    }
}
