@extends('layouts.app')

@section('content')


    @if (session('Registration'))
        <div class="alert alert-success alert-dismissible fade show"role="alert">
            {{ session('Registration') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert">
            </button>
        </div>
    @endif


    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-md-5">
            <div class="card shadow border-0">
                <div class="card-body p-4">
                    <h3 class="text-center text-dark fw-bold mb-4">Login Form</h3>


                    <form action="{{ route('loginstore') }}" method="POST">
                        @csrf


                        <div class="mb-3">
                            <label class="form-label fw-bold">Email</label>

                            <input type="email" class="form-control" name="email"
                                placeholder="Enter Email">

                            @error('email')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>



                        <div class="mb-3">
                            <label class="form-label fw-bold">Password</label>

                            <input type="password" class="form-control" name="password" placeholder="Enter Password">

                            @error('password')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>



                        <div class="text-center">
                            <button type="submit" class="btn btn-dark w-100">Login</button>
                        </div>


                        <p class="text-center mt-3 mb-0 text-secondary">Don't have an account?
                            <a href="{{ route('registerpage') }}"class="link-primary text-decoration-none fw-bold">Register</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
