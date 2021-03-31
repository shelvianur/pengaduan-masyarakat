<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Petugas extends Authenticatable
{
    use Notifiable;

    protected $table = 'petugas_shelvia';

    protected $primaryKey = 'id_petugas';

    protected $guard = 'admin';

    protected $fillable = [
        'nama_petugas',
        'username',
        'password',
        'telp',
        'email',
        'level'
    ];
}
