<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan_shelvia';

    protected $primaryKey = 'id_pengaduan';

    protected $dates = ['tgl_pengaduan'];

    protected $fillable = [
        'masyarakat_id',
        'tgl_pengaduan',
        'judul_laporan',
        'isi_laporan',
        'status'
    ];

    public function foto(){
    	return $this->hasMany('App\Models\Foto', 'pengaduan_id', 'id_pengaduan');
    }
}
