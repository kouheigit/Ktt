<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freeday extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'freedays',
        'max_freedays',
        'startdate',
        'end_date',
    ];
    public function users(): BelongsToMay
    {
        return $this->belongsToMany(User::class);
    }
}
