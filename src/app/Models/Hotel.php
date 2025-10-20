<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'description',
        'status',
    ];

    // リレーション定義
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}