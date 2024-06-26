<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'user';

    protected $primaryKey = 'id_user';

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'f_inicio',
        'f_final',
        'importe',
        'estatus',
    ];
}
