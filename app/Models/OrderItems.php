<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    protected $fillable = [
        'order_id', // Foreign key to relate to the Order model
        'fruit_id', // Foreign key to relate to the Fruit model
        'order_qty',
        'price_per_item',
    ];

    // Define the relationship with Order model
    public function order()
    {
        return $this->belongsTo(Orders::class);
    }

    // Define the relationship with Fruit model
    public function fruit()
    {
        return $this->belongsTo(Fruits::class);
    }
}
