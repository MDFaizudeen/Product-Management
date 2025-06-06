<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','total_price' ,'address', 'pin_code', 'status' ,'state', 'city'
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
//     public function product()
// {
//     return $this->belongsTo(Product::class);
// }


    // Optional: total order amount
    // public function getTotalAmountAttribute()
    // {
    //     return $this->orderItems->sum(function ($item) {
    //         return $item->price * $item->quantity;
    //     });
    // }
}
