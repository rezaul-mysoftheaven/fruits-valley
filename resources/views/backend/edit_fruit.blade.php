@extends('backend/layouts/master')

@section('main-content')

@include('backend/layouts/side-top-bar')

<!-- Content (No need for this in your case) -->
<div class="content">
    <div class="container">
        <h2 class="text-center">Edit this Fruit</h2>


        <form action="{{ route('update_fruit', $fruit->id) }}" method="post" class="row g-3 align-items-center justify-content-center" enctype="multipart/form-data">
            @csrf
            {{-- if any error then this code will be run --}}
            @if(session()->has('fr_added'))
            <div class="col-12 col-md-8 alert alert-success">
                {{ session('fr_added') }}
            </div>
            @endif

            <div class="col-md-8 col-12">
                <label for="fr_name" class="form-label">Fruit Name</label>
                <input type="text" class="form-control" id="fr_name" name="fr_name" value="{{ $fruit->fr_name }}" required>
            </div>
            <div class="col-md-8 col-12">
                <div class="image-container" style="height: 100px;">
                    <img src="{{ asset('uploads/fruits/' . $fruit->fr_img) }}" alt="{{ $fruit->fr_name }}">
                </div>
                <label for="fr_img" class="form-label">Fruit Image</label>
                <input type="file" class="form-control" id="fr_img" name="fr_img">
            </div>
            <div class="col-md-8 col-12">
                <label for="fr_qty" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="fr_qty" name="fr_qty" value="{{ $fruit->fr_qty }}" required>
            </div>
            <div class="col-md-8 col-12">
                <label for="fr_old_price" class="form-label">Old Price</label>
                <input type="number" class="form-control" id="fr_old_price" name="fr_old_price" value="{{ $fruit->fr_old_price }}" required>
            </div>
            <div class="col-md-8 col-12">
                <label for="fr_cur_price" class="form-label">Current Price</label>
                <input type="number" class="form-control" id="fr_cur_price" name="fr_cur_price" value="{{ $fruit->fr_cur_price }}" required>
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-lg btn-primary">Update this Fruit</button>
            </div>
        </form>
    </div>                  
</div>

@endsection