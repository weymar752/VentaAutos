<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    protected $table = 'sedes';
    protected $primaryKey = 'ID_Sede';
    public $timestamps = true;

    protected $fillable = [
        'NombreSede',
        'Ubicacion_Sede',
    ];
}
