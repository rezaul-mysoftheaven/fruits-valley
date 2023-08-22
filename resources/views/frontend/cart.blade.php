<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruits Valley | Cart Items</title>
    <link rel="stylesheet" href="{{ asset('resources') }}/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('resources') }}/css/bootstrap.min.css">
</head>
<!-- cart.blade.php -->
<!-- Include the header and other common sections here -->

<div class="container">
    <h1 class="my-4 text-center">Cart Items</h1>

    @if(count($cartItemsWithDetails) > 0)
    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Price per Item</th>
                    <th>Total Price</th>
                    <th>Action</th> <!-- Add a new column for the Remove button -->
                </tr>
            </thead>
            <tbody>
                @foreach($cartItemsWithDetails as $cartItem)
                <!-- Inside the foreach loop that displays the cart items -->
                <tr>
                    <td class="align-middle">{{ $cartItem['fruit']->fr_name }}</td>
                    <td class="align-middle">
                        <!-- Display the image -->
                        <img src="{{ asset('uploads/fruits/' . $cartItem['fruit']->fr_img) }}" alt="{{ $cartItem['fruit']->fr_name }}" height="60px" width="auto">
                    </td>


                    <!-- Display the quantity for each item -->
                    <td class="align-middle text-center">
                        <div class="d-flex justify-content-center align-items-center mx-auto w-50" style="height: 60px;">
                            <button class="btn btn-outline-danger btn-sm" onclick="changeQuantity('{{ $cartItem['fruit']->id }}', 'decrease')">
                                <i class="fas fa-arrow-down"></i></button>
                            <input type="number" class="form-control form-control-sm align-middle text-center" id="quantity-{{ $cartItem['fruit']->id }}" value="{{ $cartItem['quantity'] }}" min="1" data-price="{{ $cartItem['fruit']->fr_cur_price }}" onchange="updateTotal('{{ $cartItem['fruit']->id }}')">
                            <button class="btn btn-outline-success btn-sm" onclick="changeQuantity('{{ $cartItem['fruit']->id }}', 'increase')">
                                <i class="fas fa-arrow-up"></i></button>
                        </div>
                    </td>
                
                    {{-- Price of items --}}
                    <td class="align-middle">BDT: {{ $cartItem['fruit']->fr_cur_price }}</td>
                    <td class="align-middle" id="total-price-{{ $cartItem['fruit']->id }}">BDT: {{ $cartItem['quantity'] * $cartItem['fruit']->fr_cur_price }}</td>
                    <td class="align-middle">
                        <!-- Add the form to remove the item from the cart -->
                        <form action="{{ route('remove_from_cart') }}" method="POST">
                            @csrf
                            <input type="hidden" name="fruit_id" value="{{ $cartItem['fruit']->id }}">
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-times"></i></button>
                        </form>
                    </td>
                </tr>
                <!-- ... -->
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p class="text-center">Your cart is empty.</p>
    @endif

    <div class="text-center mt-4">
        <a href="{{ route('frontend.home') }}" class="btn btn-primary btn-lg">Continue Shopping</a>
        @auth
        <!-- If the user is logged in, proceed to the checkout page -->
        <a href="{{ route('checkout') }}" class="btn btn-success btn-lg">Proceed to Checkout</a>
        @else
        <!-- If the user is not logged in, show the login page -->
        <a href="{{ route('login_page', ['redirect' => 'show_cart']) }}" class="btn btn-success btn-lg">Proceed to Checkout</a>
        @endauth
    </div>
    

    <!-- Display the final total price -->
    <div class="text-center my-4">
        <h5 class="fw-bold">Total Price <span id="final-total">0</span></h5>
    </div>
</div>


<!-- Include the footer and other common sections here -->

<!-- ... -->

<script src="{{ asset('resources') }}/js/jquery-3.7.0.min.js"></script>
<script src="{{ asset('resources') }}/js/all.min.js"></script>
<script src="{{ asset('resources') }}/js/bootstrap.bundle.min.js"></script>

<!-- Include your custom JS file -->
<script src="{{ asset('frontend/js/cart.js') }}"></script>
