<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SertifikasiStatistic extends Model
{
    protected $fillable = [
        'nama_program',
        'peserta_kompeten',
        'peserta_belum_kompeten',
        'sort_order',
    ];

    protected $casts = [
        'peserta_kompeten' => 'integer',
        'peserta_belum_kompeten' => 'integer',
        'sort_order' => 'integer',
    ];
}
