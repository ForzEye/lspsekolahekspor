<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SertifikasiAlur extends Model
{
    protected $fillable = [
        'type', 'step_number', 'title', 'description', 'icon', 'extra_label', 'extra_content',
    ];

    public function scopeTatapMuka($query)
    {
        return $query->where('type', 'tatap_muka')->orderBy('step_number');
    }

    public function scopeJarakJauh($query)
    {
        return $query->where('type', 'jarak_jauh')->orderBy('step_number');
    }
}
