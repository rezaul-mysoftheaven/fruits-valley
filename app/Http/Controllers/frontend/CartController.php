<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection; 
use App\Models\Cart;
use App\Models\Fruits;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // ... Your existing methods

    public function addToCart(Request $request)
    {
        $productId = $request->input('fruit_id');
        $quantity = $request->input('quantity');

        if (Auth::check()) {
            // User is authenticated, add item to the cart in the database
            $userId = Auth::id();
            Cart::addToCart($userId, $productId, $quantity);
        } else {
            // User is a guest, store cart data in the session
            $cartItems = Session::get('cart', []);
            if (isset($cartItems[$productId])) {
                $cartItems[$productId] += $quantity;
            } else {
                $cartItems[$productId] = $quantity;
            }
            Session::put('cart', $cartItems);
        }

        return redirect()->route('frontend.home')->with('success', 'Item added to cart successfully.');
    }
    
    public function showCart()
    {
        if (Auth::check()) {
            // User is authenticated, retrieve cart items from the database
            $userId = Auth::id();
            $cartItemsWithDetails = Cart::where('user_id', $userId)->with('fruit')->get();
        } else {
            // User is a guest, retrieve cart items from the session
            $cartItems = Session::get('cart', []);
            $cartItemsWithDetails = new Collection();
            foreach ($cartItems as $productId => $quantity) {
                $fruit = Fruits::find($productId);
                if ($fruit) {
                    $cartItemsWithDetails->push([
                        'fruit' => $fruit,
                        'quantity' => $quantity,
                    ]);
                }
            }
        }
    
        // Sort the cart items in reverse order based on time
        $cartItemsWithDetails = $cartItemsWithDetails->sortByDesc(function ($item) {
            return $item['fruit']->created_at;
        });
    
        return view('frontend.cart', compact('cartItemsWithDetails'));
    }
    
    

    // Method to remove an item from the cart
    public function removeFromCart(Request $request)
    {
        $productId = $request->input('fruit_id');

        if (Auth::check()) {
            // User is authenticated, remove item from the cart in the database
            $userId = Auth::id();
            Cart::removeFromCart($userId, $productId);
        } else {
            // User is a guest, remove item from the session cart
            $cartItems = Session::get('cart', []);
            unset($cartItems[$productId]);
            Session::put('cart', $cartItems);
        }

        return redirect()->route('show_cart')->with('success', 'Item removed from cart successfully.');
    }

    // ... other cart actions like updating quantity, checkout, etc. can be added here ...

    //Check Out

    public function CheckOut()
    {
        echo "asi re vaai asi";
    }



}


