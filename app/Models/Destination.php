<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = ['name', 'description', 'location', 'image', 'provider_id'];

    public function provider()
    {
        return $this->belongsTo(User::class, 'provider_id');
    }
}