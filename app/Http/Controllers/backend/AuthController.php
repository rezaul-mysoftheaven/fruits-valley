<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Custom_Validation\CustomValidator;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    //To show user registration form

    public function regNew(){
        return view('backend/regNew');
    }

    //To show user login form
    public function login_page(){
        return view('backend.login_page');
    }


    
    //Creating a new user
    public function create_user(Request $data)
    {

        //validate the data
        $is_valid = Validator::make($data->all(), [
            'firstName' => 'required',
            'surName' => 'required',
            'email' => 'required|string|email|unique:users', 
            'phone' => ['required', 'string', new CustomValidator],
            'password' => 'required|string',
            'confirm_password' => 'required|same:password',
        ]);

    
        //If validation failed then this code will be run
        if($is_valid->fails()) {
            return redirect()->back()->withErrors($is_valid)->withInput();
        }

        echo "Validation Passed";
    

        //If the compiled in this then we have passed Validation!,
        

        //Now we store the data into database 
        $user = new User(); //create an object for User Model
        $user->first_name = $data->firstName;
        $user->sur_name = $data->surName;
        $user->email = $data->email;
        $user->phone = $data->phone;
        $user->password = $data->password;

        $save = $user->save(); // store the data on the database
    
        if($save) //if data stored successgully then this code will be run
            return redirect()->route('login_page')->with('success', 'Registration Successfull! Now You Can Login this system'); //redirect on login page

        else //if makes any error then this code will be run and go back previous page
            return redirect()->back()->with('danger', 'Something is Wrong.');
    }

    //log in into the system
    /*
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed, redirect to diferent dashboard based on role
            if (auth()->user()->role === User::ROLE_ADMIN) {
                return redirect()->route('admin_dashboard');
            } 
            
            else {
                return redirect()->route('frontend.home');
            }
        }

        // If Authentication failed, redirect back to login page with an error message
        return redirect()->route('login_page')->with('error', 'Failed to login. Check your email and passwrd again');
    }
    */

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Authentication passed, redirect to different dashboard based on role
            if (auth()->user()->role === User::ROLE_ADMIN) {
                return redirect()->route('admin_dashboard');
            } 
            
            else {
                // After successful authentication, retrieve and store the cart data from the session
                if (Session::has('cart')) {
                    $cartItems = Session::get('cart');
                    $userId = Auth::id();
    
                    foreach ($cartItems as $productId => $quantity) {
                        Cart::addToCart($userId, $productId, $quantity);
                    }
    
                    // Clear the cart data from the session
                    Session::forget('cart');

                    return redirect()->route('show_cart');
                }

                else return redirect()->route('frontend.home');
                
            }
        }
    
        // Authentication failed, redirect back with an error message
        return redirect()->back()->with('error', 'Invalid credentials');
    }


    //kick out from the system
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login_page');
    }

    //Show the user dashboard
    public function user_dashboard(){
        return view('backend.user_dashboard');
    }

    //Show the admin dashboard
    public function admin_dashboard(){
        return view('backend.admin_dashboard');
    }
    
}
