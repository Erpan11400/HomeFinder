<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    /** @use HasFactory<\Database\Factories\PropertyFactory> */
    protected $primaryKey = 'property_id';
    protected $fillable = [
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
      ];

    use HasFactory;
}
