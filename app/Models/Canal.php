<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Canal extends Model
{
    protected $table = 'canales';
    protected $primaryKey = 'ID_Canal';
    public $timestamps = true;

    protected $fillable = [
        'TipoCanal',
        'Canal',
    ];
}
