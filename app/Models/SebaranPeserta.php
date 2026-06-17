<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SebaranPeserta extends Model
{
    protected $table = 'sebaran_pesertas';

    protected $fillable = [
        'nama_wilayah',
        'latitude',
        'longitude',
        'jumlah_peserta',
    ];

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
        'jumlah_peserta' => 'integer',
    ];
}
