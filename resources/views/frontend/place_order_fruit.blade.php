<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruits Valley | {{ $fruit->fr_name ?? 'Default Value' }}</title>
    <link rel="stylesheet" href="{{ asset('resources') }}/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('resources') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('resources') }}/css/style.css">
</head>

    <body style="margin: 0; padding: 0; overflow: hidden;">
        <section class="mt-4 mb-5 d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                    
                    @if(session()->has('order_success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('order_success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                
                    <div class="card h-100 shadow">
                        <div class="image-container">
                            <img src="{{ asset('uploads/fruits/' . $fruit->fr_img) }}" alt="{{ $fruit->fr_name }}"
                                class="card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-primary fw-bold text-center">{{ $fruit->fr_name }}</h5>
                            <div class="d-flex justify-content-center align-items-center mb-1">
                                @if($fruit->fr_old_price > $fruit->fr_cur_price)
                                    <del class="text-muted me-4 fw-bold">BDT: {{ $fruit->fr_old_price }}</del>
                                @endif
                                <span class="text-dark fw-bold">BDT: {{ $fruit->fr_cur_price }}</span>
                            </div>

                            <!-- Quantity Input Field -->
                            <form action="{{ route('submit_order', $fruit->id) }}" method="get">
                                @csrf
                                <input type="hidden" name="fruit_id" value="{{ $fruit->id }}">
                                
                                <div class="form-group mb-3">
                                    <label for="quantity" class="form-label">Quantity:</label>
                                    <input type="number" name="order_qty" id="quantity" class="form-control"
                                        value="1" min="1" oninput="updateTotalPrice({{ $fruit->fr_cur_price }})">
                                </div>
                                <div class="mb-3 d-flex justify-content-center">
                                    <label for="total_price" class="form-label">Total Price:</label>
                                    <span id="total_price" class="fw-bold">BDT: {{ $fruit->fr_cur_price }}</span>
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    @if($fruit->fr_qty > 0 && $fruit->fr_availability == 1)
                                        <button type="submit" class="btn btn-primary">Place Order</button>
                                    @else
                                        <button type="button" class="btn btn-primary" disabled>Out of Stock</button>
                                    @endif
                                </div>
                            </form>
                        </div>
                        <div class="card-footer bg-light text-center">
                            @if($fruit->fr_availability == 1 && $fruit->fr_qty > 0)
                                <small class="text-success fw-bold">In Stock</small>
                            @else
                                <small class="text-danger fw-bold">Out of Stock</small>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script>
        const frontendHomeRoute = "{{ route('frontend.home') }}";
    </script>
    
    <script src="{{ asset('resources') }}/js/jquery-3.7.0.min.js"></script>
    <script src="{{ asset('resources') }}/js/all.min.js"></script>
    <script src="{{ asset('resources') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('resources') }}/js/main.js"></script>
    
</body>

</html>
