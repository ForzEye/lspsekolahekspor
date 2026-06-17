<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Hero extends Model
{
    protected $fillable = [
        'badge_text', 'headline', 'subheadline',
        'btn_primary_text', 'btn_primary_url',
        'btn_secondary_text', 'btn_secondary_url',
        'stat_1_value', 'stat_1_label',
        'stat_2_value', 'stat_2_label',
        'stat_3_value', 'stat_3_label',
        'image', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Accessors
    public function getImageUrlAttribute(): string
    {
        return $this->image
            ? Storage::url($this->image)
            : asset('images/placeholder.png');
    }
}
