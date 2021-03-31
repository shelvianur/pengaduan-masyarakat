<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan_shelvia';

    protected $primaryKey = 'id_pengaduan';

    protected $fillable = [
        'masyarakat_id',
        'tgl_pengaduan',
        'judul_laporan',
        'isi_laporan',
        'status'
    ];
}
