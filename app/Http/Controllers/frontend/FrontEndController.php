<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fruits;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FrontEndController extends Controller
{
    // public function index(){
    //     $fruits = Fruits::all()->where('fr_soft_delete', '0');
    //     return view('frontend.index', compact('fruits'));
    // }

    public function index()
    {
        $fruits = Fruits::where('fr_soft_delete', 0)->get();

        // Retrieve the cart item count
        $cartItemCount = 0;
        if (Auth::check()) {
            // User is authenticated, get cart item count from the Cart model
            $cartItemCount = Cart::where('user_id', Auth::id())->count();
        } else {
            // User is a guest, get cart item count from the session
            $cartItems = Session::get('cart', []);
            $cartItemCount = count($cartItems);
        }

        return view('frontend.index', compact('fruits', 'cartItemCount'));
    }
}
