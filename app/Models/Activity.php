<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Activity extends Model
{
    protected $fillable = [
        'title', 'category', 'type', 'media_path',
        'description', 'date', 'is_featured', 'order'
    ];

    public function getMediaUrlAttribute()
    {
        if ($this->type === 'video') {
            return $this->media_path;
        }
        return Storage::url($this->media_path);
    }
}
