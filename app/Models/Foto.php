<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $table = 'foto_shelvia';

    protected $fillable = [
        'pengaduan_id',
        'foto'
    ];
}
