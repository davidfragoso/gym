<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SysAdmin extends Model
{
    use HasFactory;

    protected $table = 'sys_admin';

    protected $primaryKey = 'id_admin';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'PASSWORD',
    ];
}
