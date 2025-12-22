<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Purchasement extends Model
{
    protected $fillable = [
        'user_id',
        'property_id',
        'payment_method',
        'total',
        'created_at',
        'updated_at'
    ];


    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function property() {
        return $this->hasOne(Property::class, 'property_id', 'property_id');
    }
}
