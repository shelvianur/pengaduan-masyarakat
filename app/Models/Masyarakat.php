<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Masyarakat extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'masyarakat_shelvia';

    protected $primaryKey = 'id_masyarakat';

    protected $guard = 'masyarakat';

    public $timestamps = true;

    protected $fillable = [
        'nik',
        'nama',
        'username',
        'password',
        'telp',
        'email'
    ];
}
