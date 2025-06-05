<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    protected $fillable = ['name', 'description', 'location', 'price_per_night', 'provider_id', 'image'];

    public function provider()
    {
        return $this->belongsTo(User::class, 'provider_id');
    }

    public function bookings()
    {
        return $this->morphMany(Booking::class, 'bookable');
    }
}