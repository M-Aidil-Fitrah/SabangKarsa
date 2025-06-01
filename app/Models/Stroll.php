<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stroll extends Model
{
    protected $fillable = ['name', 'description', 'location', 'category', 'image', 'provider_id'];

    public function provider()
    {
        return $this->belongsTo(User::class, 'provider_id');
    }
}