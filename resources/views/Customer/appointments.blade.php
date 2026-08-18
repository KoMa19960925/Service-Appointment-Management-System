@extends('layouts.app')

@section('content')

<div class="d-flex" style="min-height: 100vh">
    <nav class="d-flex flex-column flex-shrink-0 p-3 bg-dark"
         style="width: 260px">

        <ul class="nav nav-pills flex-column gap-2 mb-auto">

            <li class="nav-item">
                <a href="{{ route('Customer.dashboard') }}"
                   class="nav-link {{ request()->routeIs('Customer.dashboard') ? 'active' : 'text-white' }}">
                    <i class="bi bi-speedometer2 me-2"></i>
                    Dashboard
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('Customer.services') }}"
                   class="nav-link {{ request()->routeIs('Customer.services') ? 'active' : 'text-white' }}">
                    <i class="bi bi-wrench-adjustable me-2"></i>
                    Services
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('Customer.requests') }}"
                   class="nav-link {{ request()->routeIs('Customer.requests') ? 'active' : 'text-white' }}">
                    <i class="bi bi-clipboard-check me-2"></i>
                    My Requests
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('Customer.appointments') }}"
                   class="nav-link {{ request()->routeIs('Customer.appointments') ? 'active' : 'text-white' }}">
                    <i class="bi bi-calendar-check me-2"></i>
                    My Appointments
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('Customer.history') }}"
                   class="nav-link {{ request()->routeIs('Customer.history') ? 'active' : 'text-white' }}">
                    <i class="bi bi-clock-history me-2"></i>
                    Service History
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('Customer.feedback') }}"
                   class="nav-link {{ request()->routeIs('Customer.feedback') ? 'active' : 'text-white' }}">
                    <i class="bi bi-star me-2"></i>
                    Feedback
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
                        Customer
                    </small>
                </div>
            </div>
        </div>


        <form action="{{ route('logoutpage') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger w-100">
                <i class="bi bi-box-arrow-right me-2"></i>Logout
            </button>
        </form>
    </nav>


   
    <main class="flex-grow-1 p-4 bg-light">
        <div class="container-fluid">
            <div class="mb-4">
                <h2 class="fw-bold">
                    My Appointments
                </h2>

                <p class="text-muted">
                    View your scheduled service appointments.
                </p>
            </div>


     
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        
                        <table class="table table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>Appointment ID</th>
                                    <th>Service</th>
                                    <th>Technician</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                </tr>
                            </thead>


                            <tbody>
                                <tr>
                                    <td>AP001</td>
                                    <td>Electrical Service</td>
                                    <td>Kumar</td>
                                    <td>20 Aug 2026</td>
                                    <td>10:00 AM</td>
                                    <td>
                                    <span class="badge bg-primary">Scheduled</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

@endsection