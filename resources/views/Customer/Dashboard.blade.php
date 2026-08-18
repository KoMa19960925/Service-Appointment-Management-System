@extends('layouts.app')

@section('content')
    <div class="d-flex" style="min-height: 160vh">
        <nav class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 260px" data-bs-theme="dark">
            <ul class="nav nav-pills flex-column mb-auto">


                <a href="{{ route('Customer.dashboard') }}"
                    class="nav-link {{ request()->routeIs('Customer.dashboard') ? 'active' : 'text-white' }}">
                    <i class="bi bi-speedometer2 me-2"></i>
                    Dashboard
                </a>


                <a href="{{ route('Customer.services') }}"
                    class="nav-link {{ request()->routeIs('Customer.services') ? 'active' : 'text-white' }}">
                    <i class="bi bi-wrench-adjustable me-2"></i>
                    Services
                </a>


                <a href="{{ route('Customer.requests') }}"
                    class="nav-link {{ request()->routeIs('Customer.requests') ? 'active' : 'text-white' }}">
                    <i class="bi bi-clipboard-check me-2"></i>
                    My Requests
                </a>


                <a href="{{ route('Customer.appointments') }}"
                    class="nav-link {{ request()->routeIs('Customer.appointments') ? 'active' : 'text-white' }}">
                    <i class="bi bi-calendar-check me-2"></i>
                    My Appointments
                </a>


                <a href="{{ route('Customer.history') }}"
                    class="nav-link {{ request()->routeIs('Customer.history') ? 'active' : 'text-white' }}">
                    <i class="bi bi-clock-history me-2"></i>
                    Service History
                </a>


                <a href="{{ route('Customer.feedback') }}"
                    class="nav-link {{ request()->routeIs('Customer.feedback') ? 'active' : 'text-white' }}">
                    <i class="bi bi-star me-2"></i>
                    Feedback
                </a>


            </ul>
            <hr>

            <div class="mb-3 text-white">
                <div class="d-flex align-items-center">
                    <i class="bi bi-person-circle me-2 fs-4"></i>
                    <div>
                        <strong>
                            {{ Auth::user()->name }}
                        </strong>
                        <small class="d-block text-secondary">Customer</small>
                    </div>
                </div>
            </div>

            <form action="{{ route('logoutpage') }}" method="POST">
                @csrf
                <button type="submit"class="btn btn-danger w-100"><i class="bi bi-box-arrow-right me-2"></i>Logout</button>
            </form>

        </nav>



        <main class="flex-grow-1 p-4 bg-light">
            <div class="container-fluid">

                <div class="mb-4">
                    <h2 class="fw-bold">Customer Dashboard</h2>
                    <p class="text-muted">
                        Welcome back, {{ Auth::user()->name }}
                    </p>
                </div>


                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-body p-4">
                        <h4 class="fw-bold">Welcome to Service & Appointment Management System</h4>
                        <p class="text-muted mb-0">
                            Browse available services, submit service requests,
                            manage your appointments, and view your service history.
                        </p>
                    </div>
                </div>

                <hr>

                <div class="row g-4">
                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="text-muted">Service Requests</h6>
                                        <h3 class="fw-bold">0</h3>
                                    </div>
                                    <i class="bi bi-clipboard-check fs-1 text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="text-muted">Pending</h6>
                                        <h3 class="fw-bold">0</h3>
                                    </div>
                                    <i class="bi bi-hourglass-split fs-1 text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="text-muted">Appointments</h6>
                                        <h3 class="fw-bold">0</h3>
                                    </div>
                                    <i class="bi bi-calendar-check fs-1 text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="text-muted">Completed</h6>
                                        <h3 class="fw-bold">0</h3>
                                    </div>
                                    <i class="bi bi-check-circle fs-1 text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>
@endsection
