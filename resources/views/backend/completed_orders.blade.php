@extends('backend/layouts/master')

@section('main-content')
@include('backend/layouts/side-top-bar')

<div class="content">
    <div class="container">
        <h2 class="text-success">Completed Orders</h2>
        <table id="fruitsTable" class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Fruit Name</th>
                    <th scope="col">Fruit Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Total Amount</th>
                    {{-- <th scope="col">Action</th> --}}
                </tr>
            </thead>
            <tbody>
                <!-- Sample data for demonstration purposes -->
                @foreach ($orders as $item)
                <tr class="align-items-center justify-content-center">
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $item->user->first_name }}</td>
                    <td class="align-middle">{{ $item->fruit->fr_name }}</td>
                    
                    <td class="align-middle">
                        <div class="image-container" style="height: 50px;">
                            <img src="{{ asset('uploads/fruits/' . $item->fruit->fr_img) }}" alt="{{ $item->fr_name }}">
                        </div>
                    </td>

                    <td class="align-middle">{{ $item->fruit->fr_cur_price }}</td>
                    <td class="align-middle">{{ $item->order_qty }}</td>
                    <td class="align-middle">{{ $item->total_price }}</td>

                    {{-- <td class="align-middle">
                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#orderCompleteModal{{ $item->id }}">
                            <i class="fas fa-check"></i>
                        </button>
                       @include('backend/layouts/order_complete_modal')

                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#orderCancelModal{{ $item->id }}">
                            <i class="fas fa-times"></i>
                        </button>
                        @include('backend/layouts/order_cancel_modal')
                       
                    </td> --}}
                </tr>

                {{-- Order Complete Aleart --}}
                {{-- @if(session()->has('order_complete'))
                    <div class="alert alert-success text-center mb-0">
                        {{ session('order_complete') }}
                    </div>
                @php
                    session()->forget('order_complete');
                @endphp
                @endif
                
                {{-- Order Cancel Aleart --}}
                {{-- @if(session()->has('order_cancel'))
                    <div class="alert alert-danger text-center mb-0">
                        {{ session('order_cancel') }}
                    </div>
                @php
                    session()->forget('order_cancel');
                @endphp
                @endif --}} 

                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection