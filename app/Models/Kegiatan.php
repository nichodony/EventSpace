<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $fillable = [
        'kode_kegiatan',
        'nama_kegiatan',
        'tanggal',
        'lokasi',
        'penanggung_jawab',
        'status'
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
