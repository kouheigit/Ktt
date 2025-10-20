<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, SoftDeletes;

    protected $fillable = [
        'member_id',
        'name',
        'email',
        'password',
        'last_name',
        'first_name',
        'last_kana',
        'first_kana',
        'zip1',
        'zip2',
        'address1',
        'address2',
        'tel',
        'company_name',
        'company_kana',
        'company_zip1',
        'company_zip2',
        'company_address1',
        'company_address2',
        'company_tel',
        'company_fax',
        'send_name',
        'send_kana',
        'send_zip1',
        'send_zip2',
        'send_address1',
        'send_address2',
        'send_tel',
        'type',
        'agree',
        'status',
        'user_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // リレーション定義
    public function hotels()
    {
        return $this->belongsToMany(Hotel::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function userPoints()
    {
        return $this->hasMany(UserPoint::class);
    }
}
