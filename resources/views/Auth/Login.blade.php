@extends('layouts.app')

@section('content')

<div class="min-vh-100 d-flex align-items-center justify-content-center bg-dark py-4">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-xl-9 col-lg-10 col-md-11">

                <div class="card border-0 shadow-lg overflow-hidden rounded-4">

                    <div class="row g-0">

                        <div class="col-lg-5 d-flex align-items-center position-relative overflow-hidden"
                            style="background: linear-gradient(145deg, #344554, #0b1015); min-height: 560px;">

                            <div class="position-absolute bg-dark rounded-circle"
                                style="width: 230px; height: 230px; bottom: -100px; left: -80px; opacity: .8;">
                            </div>

                            <div class="position-absolute bg-dark rounded-circle"
                                style="width: 170px; height: 170px; bottom: 20px; right: -70px; opacity: .7;">
                            </div>

                            <div class="position-absolute bg-dark rounded-circle"
                                style="width: 150px; height: 150px; top: 80px; right: -70px; opacity: .7;">
                            </div>

                            <div class="position-relative text-white p-5">

                                <div class="mb-4">
                                    <i class="bi bi-tools fs-1"></i>
                                </div>

                                <h1 class="fw-bold display-6 mb-2">
                                    WELCOME
                                </h1>

                                <h5 class="fw-semibold mb-4">
                                    SERVICE & APPOINTMENT
                                </h5>

                                <p class="mb-4 text-white-50">
                                    Manage your service requests, appointments,
                                    technicians, payments and customer feedback
                                    easily from one system.
                                </p>

                                <div class="d-flex align-items-center gap-3">

                                    <div class="bg-white bg-opacity-25 rounded-circle p-3">
                                        <i class="bi bi-calendar-check fs-4"></i>
                                    </div>

                                    <div>

                                        <div class="fw-semibold">
                                            Easy Service Management
                                        </div>

                                        <small class="text-white-50">
                                            Simple and efficient
                                        </small>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-7 bg-white">

                            <div class="p-4 p-md-5">

                                @if (session('Registration'))

                                    <div class="alert alert-success alert-dismissible fade show rounded-3"
                                        role="alert">

                                        <i class="bi bi-check-circle me-2"></i>

                                        {{ session('Registration') }}

                                        <button
                                            type="button"
                                            class="btn-close"
                                            data-bs-dismiss="alert">
                                        </button>

                                    </div>

                                @endif

                                <div class="mb-4">

                                    <h2 class="fw-bold text-dark mb-2">
                                        Login
                                    </h2>

                                </div>

                                <form action="{{ route('loginstore') }}" method="POST">

                                    @csrf

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
                                                placeholder="Enter your password"
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

                                    <div class="d-flex justify-content-between align-items-center mb-4">

                                        <div class="form-check">

                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                id="remember">

                                            <label
                                                class="form-check-label text-muted"
                                                for="remember">

                                                Remember me

                                            </label>

                                        </div>

                                    </div>

                                    <button
                                        type="submit"
                                        class="btn btn-dark w-100 py-2 fw-semibold rounded-2">

                                        <i class="bi bi-box-arrow-in-right me-2"></i>

                                        Login

                                    </button>

                                    <div class="d-flex align-items-center my-4">

                                        <div class="flex-grow-1 border-top"></div>

                                        <span class="px-3 text-muted small">
                                            OR
                                        </span>

                                        <div class="flex-grow-1 border-top"></div>

                                    </div>

                                    <div class="text-center">

                                        <p class="text-muted mb-2">
                                            Don't have an account?

                                            <a
                                                href="{{ route('registerpage') }}"
                                                class="link-secondary text-decoration-none fw-bold">

                                                Register

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