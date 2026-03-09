<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;

    protected $table = 'vendedores';
    protected $primaryKey = 'Id_Vendedor';
    public $timestamps = true;

    protected $fillable = [
        'Nombre',
        'Apellido',
        'Email',
        'Password',
        'FechaNacimiento',
        'FotoVendedor',
        'ID_Sede',
    ];

    protected $hidden = [
        'Password',
    ];
}
