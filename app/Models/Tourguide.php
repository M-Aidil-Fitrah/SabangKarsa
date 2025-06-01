<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourGuide extends Model
{
    protected $fillable = ['name', 'phone', 'experience', 'price_per_day', 'provider_id', 'image'];

    public function provider()
    {
        return $this->belongsTo(User::class, 'provider_id');
    }

    public function bookings()
    {
        return $this->morphMany(Booking::class, 'bookable');
    }
}