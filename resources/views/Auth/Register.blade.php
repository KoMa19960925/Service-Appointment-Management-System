@extends('layouts.app')

@section('content')

<div class="min-vh-100 d-flex align-items-center justify-content-center bg-dark py-4">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-xl-9 col-lg-10 col-md-11">

                <div class="card border-0 shadow-lg overflow-hidden rounded-4">

                    <div class="row g-0">

                        <div class="col-lg-5 d-flex align-items-center position-relative overflow-hidden"
                            style="background: linear-gradient(145deg, #344554, #0b1015); min-height: 620px;">

                            <div class="position-absolute bg-dark rounded-circle"
                                style="width: 230px; height: 230px; bottom: -100px; left: -80px; opacity: .8;">
                            </div>

                            <div class="position-absolute bg-dark rounded-circle"
                                style="width: 170px; height: 170px; bottom: 20px; right: -70px; opacity: .7;">
                            </div>

                            <div class="position-absolute bg-dark rounded-circle"
                                style="width: 150px; height: 150px; top: 70px; right: -70px; opacity: .7;">
                            </div>

                            <div class="position-relative text-white p-5">

                                <div class="mb-4">
                                    <i class="bi bi-person-plus fs-1"></i>
                                </div>

                                <h1 class="fw-bold display-6 mb-2">
                                    WELCOME
                                </h1>

                                <h5 class="fw-semibold mb-4">
                                    JOIN OUR SERVICE SYSTEM
                                </h5>

                                <p class="mb-4 text-white-50">
                                    Create your account and easily manage
                                    your service requests, appointments,
                                    technicians and service history.
                                </p>

                                <div class="d-flex align-items-center gap-3">

                                    <div class="bg-white bg-opacity-25 rounded-circle p-3">
                                        <i class="bi bi-person-check fs-4"></i>
                                    </div>

                                    <div>

                                        <div class="fw-semibold">
                                            Quick Registration
                                        </div>

                                        <small class="text-white-50">
                                            Create your account easily
                                        </small>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-7 bg-white">

                            <div class="p-4 p-md-5">

                                <div class="mb-4">

                                    <h2 class="fw-bold text-dark mb-2">
                                        Register
                                    </h2>

                                    <p class="text-muted mb-0">
                                        Register to use the service management system
                                    </p>

                                </div>

                                <form action="{{ route('registerstore') }}" method="POST">

                                    @csrf

                                    <div class="mb-3">

                                        <label
                                            for="name"
                                            class="form-label fw-semibold">

                                            Full Name

                                        </label>

                                        <div class="input-group">

                                            <span class="input-group-text bg-light border-end-0">
                                                <i class="bi bi-person text-dark"></i>
                                            </span>

                                            <input
                                                type="text"
                                                id="name"
                                                name="name"
                                                class="form-control bg-light border-start-0"
                                                value="{{ old('name') }}"
                                                placeholder="Enter your full name"
                                                required>

                                        </div>

                                        @error('name')

                                            <div class="text-danger small mt-1">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>

                                    <div class="mb-3">

                                        <label
                                            for="email"
                                            class="form-label fw-semibold">

                                            Email Address

                                        </label>

                                        <div class="input-group">

                                            <span class="input-group-text bg-light border-end-0">
                                                <i class="bi bi-envelope text-dark"></i>
                                            </span>

                                            <input
                                                type="email"
                                                id="email"
                                                name="email"
                                                class="form-control bg-light border-start-0"
                                                value="{{ old('email') }}"
                                                placeholder="Enter your email"
                                                required>

                                        </div>

                                        @error('email')

                                            <div class="text-danger small mt-1">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>

                                    <div class="mb-3">

                                        <label
                                            for="password"
                                            class="form-label fw-semibold">

                                            Password

                                        </label>

                                        <div class="input-group">

                                            <span class="input-group-text bg-light border-end-0">
                                                <i class="bi bi-lock text-dark"></i>
                                            </span>

                                            <input
                                                type="password"
                                                id="password"
                                                name="password"
                                                class="form-control bg-light border-start-0 border-end-0"
                                                placeholder="Create a password"
                                                required>

                                            <button
                                                type="button"
                                                class="input-group-text bg-light border-start-0"
                                                onclick="togglePassword('password', 'passwordIcon')">

                                                <i
                                                    class="bi bi-eye"
                                                    id="passwordIcon">
                                                </i>

                                            </button>

                                        </div>

                                        @error('password')

                                            <div class="text-danger small mt-1">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>

                                    <div class="mb-4">

                                        <label
                                            for="password_confirmation"
                                            class="form-label fw-semibold">

                                            Confirm Password

                                        </label>

                                        <div class="input-group">

                                            <span class="input-group-text bg-light border-end-0">
                                                <i class="bi bi-shield-lock text-dark"></i>
                                            </span>

                                            <input
                                                type="password"
                                                id="password_confirmation"
                                                name="password_confirmation"
                                                class="form-control bg-light border-start-0 border-end-0"
                                                placeholder="Confirm your password"
                                                required>

                                            <button
                                                type="button"
                                                class="input-group-text bg-light border-start-0"
                                                onclick="togglePassword('password_confirmation', 'confirmPasswordIcon')">

                                                <i
                                                    class="bi bi-eye"
                                                    id="confirmPasswordIcon">
                                                </i>

                                            </button>

                                        </div>

                                        @error('password_confirmation')

                                            <div class="text-danger small mt-1">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>

                                    <button
                                        type="submit"
                                        class="btn btn-secondary w-100 py-2 fw-semibold rounded-2">

                                        <i class="bi bi-person-plus me-2"></i>

                                        Register

                                    </button>

                                    <div class="d-flex align-items-center my-4">

                                        <div class="flex-grow-1 border-top"></div>

                                        <span class="px-3 text-muted small">
                                            OR
                                        </span>

                                        <div class="flex-grow-1 border-top"></div>

                                    </div>

                                    <div class="text-center">

                                        <p class="m-0 text-secondary">
                                            Have an account?

                                            <a
                                                href="{{ route('loginpage') }}"
                                                class="link-dark text-decoration-none fw-bold">

                                                Login

                                            </a>

                                        </p>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
