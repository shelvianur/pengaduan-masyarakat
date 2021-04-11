<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table = 'tanggapan_shelvia';

    protected $primaryKey = 'id_tanggapan';

    protected $dates = ['tgl_tanggapan'];

    protected $fillable = [
        'pengaduan_id',
        'petugas_id',
        'tgl_tanggapan',
        'tanggapan'
    ];
}
