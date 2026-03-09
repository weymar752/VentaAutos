<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'ID_Cliente';
    public $timestamps = true;

    protected $fillable = [
        'Nombres',
        'ApellidoP',
        'ApellidoM',
        'Segmento',
        'ID_Canal',
    ];
}
