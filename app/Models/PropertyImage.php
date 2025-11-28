<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'image_path'
    ];

    // Setiap image milik 1 property
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
