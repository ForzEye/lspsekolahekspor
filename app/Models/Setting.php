<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    protected $fillable = [
        'key', 'value', 'type', 'label', 'group',
    ];

    // Helper: get all settings as key => value collection
    public static function getAllSettings()
    {
        return static::pluck('value', 'key');
    }

    // Helper: get a specific setting value by key
    public static function get(string $key, mixed $default = null): mixed
    {
        return static::where('key', $key)->value('value') ?? $default;
    }

    // Get image URL for image-type settings
    public function getImageUrlAttribute(): ?string
    {
        if ($this->type === 'image' && $this->value) {
            return Storage::url($this->value);
        }
        return $this->value;
    }
}
