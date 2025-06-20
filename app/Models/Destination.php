<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = ['name', 'description', 'location', 'category', 'rating', 'distance_from_city_center', 'image', 'provider_id'];

    public function provider()
    {
        return $this->belongsTo(User::class, 'provider_id');
    }
}