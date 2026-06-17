<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class About extends Model
{
    protected $fillable = [
        'label', 'heading', 'description', 'highlights', 'image', 'image_profil',
        'vision_title', 'vision_content',
        'mission_title', 'mission_items',
        'history_title', 'history_content', 'values',
    ];

    protected $casts = [
        'highlights'    => 'array',
        'mission_items' => 'array',
        'values'        => 'array',
    ];

    public function getImageUrlAttribute(): string
    {
        return $this->image
            ? Storage::url($this->image)
            : asset('images/placeholder.png');
    }
}
