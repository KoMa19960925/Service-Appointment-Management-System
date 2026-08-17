@extends('layouts.app')
@section('content')


    <div class="row pt-5">
        <div class="col-5 mx-auto">
            <div class="card p-4 shadow">
                <h1 class="mb-4 text-center fw-bold"> Register Form</h1>
                <form action="{{ route('registerstore') }}" method="post">
                    @csrf


                    <div class="mb-3">
                        <label class="form-label">Name:</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Password:</label>
                        <input type="password" class="form-control" name="password">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Confirm Password:</label>
                        <input type="password" class="form-control" name="password_confirmation">
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    
                    <div class="text-center">
                        <p class="m-0 text-secondary text-center">Have an account?
                            <a href="{{ route('login') }}" class="link-primary text-decoration-none">Login</a>
                        </p>
                        <button type="submit" class="btn btn-dark">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection