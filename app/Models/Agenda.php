<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = ['name', 'description', 'image', 'provider_id'];

    public function provider()
    {
        return $this->belongsTo(User::class, 'provider_id');
    }
}