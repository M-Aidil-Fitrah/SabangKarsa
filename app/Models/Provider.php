<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_usaha',
        'deskripsi',
        'kontak',
        'alamat',
        'is_verified',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function guides()
    {
        return $this->hasMany(TourGuide::class);
    }



    public function accommodations()
    {
        return $this->hasMany(Accommodation::class);
    }
}
