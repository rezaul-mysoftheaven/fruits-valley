<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'order_qty',
        'total_price',
        'order_status',
        'user_id', // Foreign key to relate to the User model
    ];

    // Define the relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with OrderItem model
    public function items()
    {
        return $this->hasMany(OrderItems::class);
    }
}
