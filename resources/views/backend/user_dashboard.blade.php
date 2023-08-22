@extends('backend/layouts/master')

@section('main-content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary fw-bold text-center text-white">User Profile</div>
                <div class="card-body">
                    <div class="row align-items-center mb-4">
                        <div class="col-md-12">
                            <h5 class="card-title mb-0">{{ auth()->user()->first_name }} {{ auth()->user()->sur_name }}</h5>
                            <p class="card-text mb-0">
                                Email: {{ auth()->user()->email }} <br>
                                Phone: {{ auth()->user()->phone }} <br>
                                Role: {{ auth()->user()->role === \App\Models\User::ROLE_ADMIN ? 'Admin' : 'Customer' }}
                            </p>
                            <a href="" class="btn btn-primary mt-3">Edit Profile</a>
                            <a href="{{ route('logout') }}" class="btn btn-danger mt-3">Log Out</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="row mt-5 justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header fw-bold text-center bg-success text-white">Purchase History</div>
                <div class="card-body">
                    @if(count(auth()->user()->orders) > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Fruit Name</th>
                                    <th>Quantity</th>
                                    <th>Total Price (BDT)</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                // Sort the orders by timestamp in descending order
                                $orders = auth()->user()->orders->sortByDesc('created_at');
                                @endphp
                            
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->fruit->fr_name }}</td>
                                    <td>{{ $order->order_qty }}</td>
                                    <td>{{ $order->total_price }}</td>
                                    <td>
                                        @if($order->order_status === 0)
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($order->order_status === 1)
                                            <span class="badge bg-danger">Cancelled</span>
                                        @elseif($order->order_status === 2)
                                            <span class="badge bg-success">Delivered</span>
                                        @else
                                            <span class="badge bg-secondary">Unknown</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                    </div>
                    @else
                    <p class="text-center">No purchase history found.</p>
                    @endif
                </div>
                
            </div>
        </div>
    </div>
</div>

<style>
    .table-bordered th,
    .table-bordered td {
        border: 1px solid #dee2e6;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f8f9fa;
    }

    .badge {
        font-size: 14px;
        padding: 6px 12px;
    }
</style>

@endsection
