<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruits Valley | Home</title>
    <link rel="stylesheet" href="{{ asset('resources') }}/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('resources') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css">
</head>

<body>
    <header>
        <!-- ... -->
        <div class="container navbar-wrapper">
            <nav class="navbar navbar-expand-lg bg-light shadow rounded">
                <!-- ... -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('frontend.home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Dropdown
                            </a>
                            <!-- ... -->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                        </li>
                    </ul>

                    <div class="nav-link ml-auto mb-2 mb-lg-0">
                        @auth
                        <a class="user-name" href="{{ route('user_dashboard') }}">
                            <i class="fas fa-user fa-lg"></i>
                            <span class="user-text">{{ auth()->user()->first_name }}</span>
                        </a>                        
                        @endauth
                    
                        <div class="cart-icon">
                            <a href="{{ route('show_cart') }}">
                                <i class="fas fa-shopping-cart"></i>
                                <!-- Cart count box -->
                                <div class="cart-count-box">
                                    @if ($cartItemCount >= 0)
                                    <span class="cart-count">{{ $cartItemCount }}</span>
                                    @endif
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </nav>
        </div>
        <!-- ... -->


        <div class="container mt-5">
            <div class="row">
                <div class="my-2 col-8 offset-2">
                    <h1 class="display-2 text-primary text-center fw-bold">Fruits Valley</h1>
                </div>

                <div class="my-4 col-8 offset-2">
                    <p class="lead text-center display-5 text-info">...I Love Fruits...</p>
                </div>
            </div>
        </div>
    </header>

    <section class="bg-light mt-4 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-8 offset-2">
                    <h2 class="text-center text-success display-4">Famous Asian Fruits</h2>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @foreach($fruits as $item)
                <!-- Inside the foreach loop that displays the products -->
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100 shadow">
                        <div class="image-container">
                            <img src="{{ asset('uploads/fruits/' . $item->fr_img) }}" alt="{{ $item->fr_name }}">

                            @php
                            $discountPercentage = 100 - (($item->fr_cur_price / $item->fr_old_price) * 100);
                            @endphp

                            @if($item->fr_old_price > $item->fr_cur_price)
                            <span class="discount-badge bg-danger">Save: {{ round($discountPercentage) }}%</span>
                            @endif
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-primary fw-bold text-center">{{ $item->fr_name }}</h5>
                            <div class="d-flex justify-content-center align-items-center mb-1">
                                @if($item->fr_old_price > $item->fr_cur_price)
                                <del class="text-muted me-4 fw-bold">BDT: {{ $item->fr_old_price }}</del>
                                @endif
                                <span class="text-dark fw-bold">BDT: {{ $item->fr_cur_price }}</span>
                            </div>
                            <div class="text-center">
                                <!-- Hidden form to add the item to the cart with quantity 1 -->
                                <form action="{{ route('add_to_cart') }}" method="POST">
                                    @csrf
                                    <!-- Add the CSRF token for security -->
                                    <input type="hidden" name="fruit_id" value="{{ $item->id }}">
                                    <input type="hidden" name="quantity" value="1"> <!-- Default quantity is 1 -->
                                    @if($item->fr_availability == 1 && $item->fr_qty!=0)
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fas fa-shopping-cart me-1"></i> Add to Cart
                                    </button>

                                    @else
                                    <button type="submit" disabled class="btn btn-primary btn-sm">
                                        <i class="fas fa-shopping-cart me-1"></i> Add to Cart
                                    </button>
                                    @endif
                                </form>
                            </div>
                        </div>
                        @if($item->fr_availability == 1 && $item->fr_qty!=0)
                        <div class="card-footer bg-success text-center">
                            <small class="text-white fw-bold">In Stock</small>
                        </div>
                        @else
                        <div class="card-footer bg-danger text-center">
                            <small class="text-white fw-bold">Out of Stock</small>
                        </div>
                        @endif
                    </div>
                </div>
                <!-- ... -->





                @endforeach
            </div>
        </div>
    </section>

    <footer class="bg-dark text-light text-center py-3">
        <div class="container">
            <p class="mt-2">&copy; 2023 Mysoft Heaven BD Ltd. All rights reserved.</p>
        </div>
    </footer>

    <script src="{{ asset('resources') }}/js/jquery-3.7.0.min.js"></script>
    <script src="{{ asset('resources') }}/js/all.min.js"></script>
    <script src="{{ asset('resources') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('resources') }}/js/main.js"></script>
</body>

</html>
