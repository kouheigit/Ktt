<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'user_id',
        'hotel_id',
        'reservation_id',
        'subtotal',
        'tax_amount',
        'discount_amount',
        'total_amount',
        'currency',
        'payment_method',
        'payment_status',
        'transaction_id',
        'paid_at',
        'delivery_method',
        'delivery_status',
        'shipped_at',
        'delivered_at',
        'status',
        'notes',
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

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function orderStatuses()
    {
        return $this->hasMany(OrderStatus::class);
    }
}