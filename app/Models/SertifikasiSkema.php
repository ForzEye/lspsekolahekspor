<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SertifikasiSkema extends Model
{
    protected $fillable = [
        'kode', 'nama', 'description', 'level', 'requirements', 'sort_order', 'is_active',
        'metode_pelaksanaan', 'masa_berlaku', 'jumlah_unit', 'harga', 'units', 'image',
    ];

    protected $casts = [
        'requirements' => 'array',
        'units'        => 'array',
        'is_active'    => 'boolean',
        'harga'        => 'float',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    public function getLevelColorAttribute(): string
    {
        return match ($this->level) {
            'Muda'  => 'bg-green-100 text-green-700',
            'Madya' => 'bg-blue-100 text-blue-700',
            'Utama' => 'bg-purple-100 text-purple-700',
            default => 'bg-gray-100 text-gray-600',
        };
    }

    public function getImageUrlAttribute(): ?string
    {
        if ($this->image) {
            return \Illuminate\Support\Facades\Storage::url($this->image);
        }
        return null;
    }
}
