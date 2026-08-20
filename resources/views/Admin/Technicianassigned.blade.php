@extends('layouts.app')

@section('content')

<div class="d-flex" style="min-height: 100vh">

    {{-- Sidebar --}}
    <nav class="d-flex flex-column flex-shrink-0 p-3 bg-dark"
         style="width: 300px">

        <ul class="nav nav-pills flex-column gap-2 mb-auto">

            <li class="nav-item">
                <a href="{{ route('Admin.dashboard') }}"
                   class="nav-link {{ request()->routeIs('Admin.dashboard') ? 'active' : 'text-white' }}">
                    <i class="bi bi-speedometer2 me-2"></i>
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('Admin.Techniciandetails') }}"
                   class="nav-link {{ request()->routeIs('Admin.Techniciandetails') ? 'active' : 'text-white' }}">
                    <i class="bi bi-wrench-adjustable me-2"></i>
                    Full Technician Details
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('Admin.Customerservicerequests') }}"
                   class="nav-link {{ request()->routeIs('Admin.Customerservicerequests') ? 'active' : 'text-white' }}">
                    <i class="bi bi-clipboard-check me-2"></i>
                    Customer Requests
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('Admin.TechnicianAssigned') }}"
                   class="nav-link {{ request()->routeIs('Admin.TechnicianAssigned') ? 'active' : 'text-white' }}">
                    <i class="bi bi-calendar-check me-2"></i>
                    Technician Assigned
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('Admin.Servicehistory') }}"
                   class="nav-link {{ request()->routeIs('Admin.Servicehistory') ? 'active' : 'text-white' }}">
                    <i class="bi bi-clock-history me-2"></i>
                    All Service History
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('Admin.Customerfeedback') }}"
                   class="nav-link {{ request()->routeIs('Admin.Customerfeedback') ? 'active' : 'text-white' }}">
                    <i class="bi bi-star me-2"></i>
                    Customer Feedback
                </a>
            </li>

        </ul>

        <hr class="text-white">

        <div class="text-white mb-3">
            <div class="d-flex align-items-center">

                <i class="bi bi-person-circle fs-4 me-2"></i>

                <div>
                    <strong>
                        {{ Auth::user()->name }}
                    </strong>

                    <small class="d-block text-secondary">
                        Admin
                    </small>
                </div>

            </div>
        </div>

        <form action="{{ route('logoutpage') }}" method="POST">
            @csrf

            <button type="submit" class="btn btn-danger w-100">
                <i class="bi bi-box-arrow-right me-2"></i>
                Logout
            </button>
        </form>

    </nav>


    {{-- Main Content --}}
    <main class="flex-grow-1 p-4 bg-light">

        <div class="container-fluid">

            <div class="mb-4">

                <h2 class="fw-bold">
                    Create Technician
                </h2>

                <p class="text-muted">
                    Add a new technician to the system.
                </p>

            </div>


            <div class="row justify-content-center">

                <div class="col-md-8">

                    <div class="card border-0 shadow-sm">

                        <div class="card-header bg-dark text-white p-3">

                            <h5 class="mb-0">
                                
                                Technician Details
                            </h5>

                        </div>


                        <div class="card-body p-4">

                            <form action="{{ route('Admin.technician.store') }}"
                                  method="POST">

                                @csrf


                                {{-- Technician Name --}}
                                <div class="mb-3">

                                    <label class="form-label fw-semibold">
                                        Technician Name
                                    </label>

                                    <input type="text"
                                           name="name"
                                           class="form-control"
                                           value="{{ old('name') }}"
                                           placeholder="Enter technician name">

                                    @error('name')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>


                                {{-- Email --}}
                                <div class="mb-3">

                                    <label class="form-label fw-semibold">
                                        Email
                                    </label>

                                    <input type="email"
                                           name="email"
                                           class="form-control"
                                           value="{{ old('email') }}"
                                           placeholder="Enter technician email">

                                    @error('email')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>


                                {{-- Phone --}}
                                <div class="mb-3">

                                    <label class="form-label fw-semibold">
                                        Phone Number
                                    </label>

                                    <input type="text"
                                           name="phone"
                                           class="form-control"
                                           value="{{ old('phone') }}"
                                           placeholder="Enter phone number">

                                    @error('phone')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>


                                {{-- Password --}}
                                <div class="mb-3">

                                    <label class="form-label fw-semibold">
                                        Password
                                    </label>

                                    <input type="password"
                                           name="password"
                                           class="form-control"
                                           placeholder="Enter password">

                                    @error('password')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>


                                {{-- Confirm Password --}}
                                <div class="mb-3">

                                    <label class="form-label fw-semibold">
                                        Confirm Password
                                    </label>

                                    <input type="password"
                                           name="password_confirmation"
                                           class="form-control"
                                           placeholder="Confirm password">

                                </div>


                                {{-- Buttons --}}
                                <div class="d-flex justify-content-between mt-4">

                                    <a href="{{ route('Admin.Techniciandetails') }}"
                                       class="btn btn-secondary">

                                        <i class="bi bi-arrow-left me-1"></i>
                                        Cancel

                                    </a>


                                    <button type="submit"
                                            class="btn btn-primary">

                                        <i class="bi bi-person-plus me-1"></i>
                                        Create Technician

                                    </button>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </main>

</div>

@endsection