<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    
    protected $fillable = [
        'name',
        'description',
        'location',
        'price_per_night',
        'provider_id',
        'image',
        'amenities', // Tambahkan ini
        'type',      // Tambahkan ini
        'owner_phone', // Tambahkan ini
    ];

    protected $casts = [
        'amenities' => 'array', // Ini akan otomatis mengonversi JSON ke array PHP
    ];

    public function provider()
    {
        return $this->belongsTo(User::class, 'provider_id');
    }

    public function bookings()
    {
        return $this->morphMany(Booking::class, 'bookable');
    }
}