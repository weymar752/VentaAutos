<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GananciaM extends Model
{
    protected $table = 'ganancias_m';
    protected $primaryKey = 'Id_Informe_Ganancia';
    public $timestamps = true;

    protected $fillable = [
        'PPTO',
        'Periodo',
        'Mes',
        'ID_Sede',
    ];
}
