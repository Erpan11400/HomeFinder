<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    /** @use HasFactory<\Database\Factories\PropertyFactory> */
    protected $primaryKey = 'property_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'property_id',
        'photo',
        'owner_name',
        'price',
        'city',
        'state',
        'country',
        'bed_room',
        'bath_room',
        'summary',
        'area_l',
        'area_w',
        'review',
        'user_id',
    ];

    public function favorites() {
        return $this->belongsToMany(User::class, 'favorites', 'property_id', 'user_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    use HasFactory;
}
