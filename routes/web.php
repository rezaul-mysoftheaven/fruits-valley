<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\FrontEndController;
use App\Http\Controllers\backend\AuthController;
use App\Http\Controllers\backend\FruitsController;
use App\Http\Controllers\frontend\OrderController;
use App\Http\Controllers\frontend\CartController;


use App\Models\User;


//from landing or home page
Route::controller(FrontEndController::class)->group(function(){
    Route::get('/','index')->name('frontend.home');
});

//Add to cart item
Route::post('/add_to_cart', [CartController::class, 'addToCart'])->name('add_to_cart');

//Show Cart Items
Route::get('/cart', [CartController::class, 'showCart'])->name('show_cart');

//Remove From Cart
Route::post('/remove_from_cart', [CartController::class, 'removeFromCart'])->name('remove_from_cart');



//for user registration page
Route::controller(AuthController::class)->group(function(){
    Route::get('/registration','regNew')->name('regNew');
    //Route::get('/registration_page','registration_page')->name('registration_page'); //view reg page
    Route::post('/create_user', 'create_user')->name('create_user'); //create user

    Route::get('/login_page','login_page')->name('login_page'); //view login page
    Route::post('/login', 'login')->name('login'); //logged in the system

    Route::get('/logout', 'logout')->name('logout'); //logout the ststem
    
});


Route::group(['middleware' => ['auth']], function () {
    // Common authenticated routes go here...

    // User routes
    Route::group(['middleware' => 'role:' . User::ROLE_USER], function () {
        //Show the users profile
        Route::get('/user_dashboard', [AuthController::class, 'user_dashboard'])->name('user_dashboard');
         
        //Place an Order
         Route::get('/place_order/{id}', [OrderController::class, 'place_order'])->name('place_order');

         //Sbmit Order
         Route::get('/submit_order/{id}', [OrderController::class, 'submit_order'])->name('submit_order');

         //Cart Routes
        //  Route::post('/add_to_cart', [CartController::class, 'addToCart'])->name('add_to_cart');
         
        Route::get('/checkout', [CartController::class, 'CheckOut'])->name('checkout');
         

    });





    // Admin routes
    Route::group(['middleware' => 'role:' . User::ROLE_ADMIN], function () {
        //To Entry the Admin Dashboard
        Route::get('/admin_dashboard', [AuthController::class, 'admin_dashboard'])->name('admin_dashboard');

        //To Show the Add Fruits Page
        Route::get('/add_fruits', [FruitsController::class, 'add_fruits'])->name('add_fruits');

        //To Store a New Fruits
        Route::post('/fr_store',[FruitsController::class, 'fr_store'])->name('fr_store');

        //To Manage and Show the Fruits
        Route::get('/manage_fruits', [FruitsController::class, 'manage_fruits'])->name('manage_fruits');

        //Available to Unavailable
        Route::get('/avl_to_unavl/{id}', [FruitsController::class, 'avl_to_unavl'])->name('avl_to_unavl');

        //Unavailabe to Available
        Route::get('/unavl_to_avl/{id}', [FruitsController::class, 'unavl_to_avl'])->name('unavl_to_avl');

        //Soft Delete a Fruit Item
        Route::get('/fr_soft_del/{id}', [FruitsController::class, 'fr_soft_delete'])->name('fr_soft_delete');

        //To Show Trash Manage
        Route::get('/trash_manage_fruits', [FruitsController::class, 'trash_manage_fruits'])->name('trash_manage_fruits');

        //Restore From Trash
        Route::get('/restore_fruits/{id}', [FruitsController::class, 'restore_fruits'])->name('restore_fruits');

        //Delete a Fruit Item
        Route::get('/fr_delete/{id}', [FruitsController::class, 'fr_delete'])->name('fr_delete');

        //Edit a Fruit
        Route::get('edit_fruit/{id}', [FruitsController::class, 'edit_fruit'])->name('edit_fruit');

        //Update a Fruit
        Route::post('update_fruit/{id}', [FruitsController::class, 'update_fruit'])->name('update_fruit');

        //Order Manage
        Route::get('/pending-orders', [OrderController::class, 'Pending_Orders'])->name('pending.orders');

        //Order Complete
        Route::get('/order-complete/{id}', [OrderController::class, 'Order_Complete'])->name('order.complete');
        
        //Order Cancel
        Route::get('/order-cancel/{id}', [OrderController::class, 'Order_Cancel'])->name('order.cancel');

        //Completed Orders
        Route::get('/completed-orders', [OrderController::class, 'Completed_Orders'])->name('completed.orders');

        //Canceled Orders
        Route::get('/canceled-orders', [OrderController::class, 'Canceled_Orders'])->name('canceled.orders');

    });
});


