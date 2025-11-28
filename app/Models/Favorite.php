<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'property_id'
    ];

    /* RELATIONSHIPS */

    // Favorit dimiliki oleh 1 user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Favorit terkait ke 1 property
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
