<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fruit_id',
        'quantity',
    ];

    // Define the relationship with the User model (one-to-many)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the Fruits model (one-to-many)
    public function fruit()
    {
        return $this->belongsTo(Fruits::class);
    }

    // Method to add an item to the cart
    public static function addToCart($userId, $fruitId, $quantity)
    {
        // Check if the item is already in the cart for the user
        $cartItem = self::where('user_id', $userId)->where('fruit_id', $fruitId)->first();

        if ($cartItem) {
            // If item already exists, update the quantity
            $cartItem->update(['quantity' => $cartItem->quantity + $quantity]);
        } else {
            // If item does not exist, create a new cart item
            self::create([
                'user_id' => $userId,
                'fruit_id' => $fruitId,
                'quantity' => $quantity,
            ]);
        }
    }

    // Method to get all cart items for a user
    public static function getUserCartItems($userId)
    {
        return self::where('user_id', $userId)->get();
    }

    // Method to remove an item from the cart
    public static function removeFromCart($userId, $fruitId)
    {
        self::where('user_id', $userId)->where('fruit_id', $fruitId)->delete();
    }

    // Method to clear the cart for a user
    public static function clearCart($userId)
    {
        self::where('user_id', $userId)->delete();
    }

    // ... other methods for managing the cart items ...
}
