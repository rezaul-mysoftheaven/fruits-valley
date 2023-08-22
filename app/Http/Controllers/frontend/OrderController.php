<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fruits;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        // Apply the 'auth' middleware to all methods in this controller
        $this->middleware('auth');
    }

    //Order a Fruit
    public function place_order($id){
        $fruit = Fruits::find($id);
        return view('frontend.place_order_fruit', compact('fruit'));
    }

    public function submit_order(Request $request, $id){
        $fruit = Fruits::findOrFail($id);

        $qty = $request->order_qty;
        $total_price = $qty * $fruit->fr_cur_price;

       
        if($fruit->fr_qty < $qty){
            return back()->with('order_success', 'No enough stock according to your requirments');
        }
        else {
            echo "asiii";
            $fruit->fr_qty -= $qty;

            $fruit->update();
        
            $order = new Orders();
            $order->user_id = Auth::id(); // If you have user authentication
            $order->fruit_id = $fruit->id;
            $order->order_qty = $qty;
            $order->total_price = $total_price;
            
            $order->save();
            return back()->with('order_success', 'Order Placed Successfully');
        }
    }

    //Manage Order Method
    public function Pending_Orders()
    {
        $orders = Orders::where('order_status', '0')->with(['user', 'fruit'])->orderByDesc('created_at')->get();
        return view('backend.pending_orders', compact('orders'));
    }

    //Order Complete
    public function Order_Complete($id)
    {
        $order = Orders::find($id);
        $order->order_status = 2;
        $order->update();

        return back()->with('order_complete', 'One Order has Successfully Completed!');
    }

    //Order Cancel
    public function Order_Cancel($id){
        $order = Orders::find($id);
        $order->order_status = 1;
        $order->update();

        return back()->with('order_cancel', 'One Order has Canceled!');
    }

    //Complered Orders
    public function Completed_Orders()
    {
        $orders = Orders::where('order_status', '2')->with(['user', 'fruit'])->orderByDesc('created_at')->get();
        return view('backend.completed_orders', compact('orders'));
    }

    //Cancled Orders
    public function Canceled_Orders()
    {
        $orders = Orders::where('order_status', '1')->with(['user', 'fruit'])->orderByDesc('created_at')->get();
        return view('backend.canceled_orders', compact('orders'));
    }



}
