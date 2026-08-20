@extends('layouts.app')

@section('content')
    <div class="d-flex" style="min-height: 100vh">
        <nav class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 250px" data-bs-theme="dark">
            <ul class="nav nav-pills flex-column mb-auto">


                <a href="{{ route('Admin.dashboard') }}"
                    class="nav-link {{ request()->routeIs('Admin.dashboard') ? 'active' : 'text-white' }}">
                    <i class="bi bi-speedometer2 me-2"></i>
                    Dashboard
                </a>


                <a href="{{ route('Admin.Techniciandetails') }}"
                    class="nav-link {{ request()->routeIs('Admin.Techniciandetails') ? 'active' : 'text-white' }}">
                   <i class="bi bi-person-plus me-2"></i>
                    Full Technician Details
                </a>


                <a href="{{ route('Admin.Customerservicerequests') }}"
                    class="nav-link {{ request()->routeIs('Admin.CustomerRequests') ? 'active' : 'text-white' }}">
                    <i class="bi bi-clipboard-check me-2"></i>
                   Customer Requests
                </a>


                <a href="{{ route('Admin.TechnicianAssigned') }}"
                    class="nav-link {{ request()->routeIs('Admin.TechnicianAssigned') ? 'active' : 'text-white' }}">
                    <i class="bi bi-calendar-check me-2"></i>
                    Technician Assigned
                </a>


                <a href="{{ route('Admin.Servicehistory') }}"
                    class="nav-link {{ request()->routeIs('Admin.Servicehistory') ? 'active' : 'text-white' }}">
                    <i class="bi bi-clock-history me-2"></i>
                    All Service History
                </a>


                <a href="{{ route('Admin.Customerfeedback') }}"
                    class="nav-link {{ request()->routeIs('Admin.Customerfeedback') ? 'active' : 'text-white' }}">
                    <i class="bi bi-star me-2"></i>
                    Customer Feedback
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
                        <small class="d-block text-secondary">Admin</small>
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
                    <h2 class="fw-bold">Admin Dashboard</h2>
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
                </div>
            </div>
        </main>
    </div>
@endsection
