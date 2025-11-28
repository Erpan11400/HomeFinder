<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'judul',
        'deskripsi',
        'harga',
        'lokasi',
        'tipe',
        'luas_tanah',
        'luas_bangunan',
        'jumlah_kamar',
        'jumlah_kamar_mandi',
        'image_cover',
        'status'
    ];

    // Property dimiliki oleh 1 User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Property memiliki banyak gambar
    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }

    // Property memiliki banyak favorit
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}
