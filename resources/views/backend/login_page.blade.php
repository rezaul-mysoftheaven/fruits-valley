@extends('backend/layouts/master')

@section('main-content')

    <div class="container">
        <div class="row align-items-center justify-content-center main-card">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center text-primary">Login into Fruit Valley Admin</h4>
                        <img src="img/admin.jpg" alt="">

                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email: </label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="abcd@xyz.com">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password: </label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                        <p class="text-center mt-3">
                            Don't have an account? <a href="{{ route('regNew') }}">Create a New Account</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
