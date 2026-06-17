<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $fillable = [
        'address', 'email', 'whatsapp', 'phone',
        'maps_embed_url', 'instagram', 'linkedin', 'youtube', 'office_hours',
    ];
}
