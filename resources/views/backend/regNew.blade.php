@extends('backend/layouts/master')

@section('main-content')
    
    <div class="container">
        <div class="row vh-100 align-items-center justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center text-primary">User Registration</h5>

                        {{-- if any error then this code will be run --}}
                        @if(session()->has('danger'))
                            <div class="alert alert-danger">
                                {{ session('danger') }}
                            </div>
                        @endif

                        <form id="regiForm" method="POST" action="{{ route('create_user') }}">
                            @csrf
                            <!-- CSRF token -->

                            <div class="mb-2">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Enter your first name" name="firstName"
                                    value="{{ old('firstName') }}" required>
                                <span class="invalid-feedback" role="alert">
                                    <strong id="firstNameError"></strong>
                                </span>
                            </div>

                            <div class="mb-2">
                                <label for="surName" class="form-label">Surname</label>
                                <input type="text" class="form-control" id="surName" placeholder="Enter your surname" name="surName"
                                    value="{{ old('surName') }}" required>
                                <span class="invalid-feedback" role="alert">
                                    <strong id="surNameError"></strong>
                                </span>
                            </div>

                            <div class="mb-2">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" value="{{ old('email') }}" required>
                                <span class="invalid-feedback" role="alert">
                                    <strong id="emailError"></strong>
                                </span>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="mb-2">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number" name="phone" value="{{ old('phone') }}" required>
                                <span class="invalid-feedback" role="alert">
                                    <strong id="phoneError"></strong>
                                </span>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password"
                                    value="{{ old('password') }}" required>
                                <span class="invalid-feedback" role="alert">
                                    <strong id="passwordError"></strong>
                                </span>
                            </div>

                            <div class="mb-2">
                                <label for="cpassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="cpassword" placeholder="Reenter your password"
                                    name="confirm_password" value="{{ old('confirm_password') }}" required>
                                <span class="invalid-feedback" role="alert">
                                    <strong id="conPasswordError"></strong>
                                </span>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                            <p class="text-center mt-3">
                                Have You Already Registered? <a href="{{ route('login_page') }}">Login into Your Account</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

    
