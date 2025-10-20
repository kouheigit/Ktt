<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'hotel_id',
        'user_id',
        'owner_id',
        'calendar_id',
        'invitation_id',
        'checkin_date',
        'checkout_date',
        'checkin_time',
        'checkout_time',
        'days',
        'name',
        'adult',
        'child',
        'dog',
        'note',
        'room_key',
        'upload',
        'payment',
        'status',
    ];

    // リレーション定義
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function calendar()
    {
        return $this->belongsTo(Calendar::class);
    }

    public function invitation()
    {
        return $this->belongsTo(Invitation::class);
    }
}