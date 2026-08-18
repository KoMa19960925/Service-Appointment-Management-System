@extends('layouts.app')

@section('content')
    <div class="d-flex" style="min-height: 100vh">

        <nav class="d-flex flex-column flex-shrink-0 p-3 bg-dark" style="width: 260px">

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
                        <small class="d-block text-secondary">Customer</small>
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
                    <h2 class="fw-bold">Available Services</h2>
                    <p class="text-muted">Choose a service you need and submit a service request.</p>
                </div>

                <div class="row g-4">

                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="mb-3">
                                    <i class="bi bi-pc-display fs-1 text-success"></i>
                                </div>
                                <h5 class="fw-bold">Computer & IT Support Service</h5>
                                <p class="text-muted">
                                    Computer troubleshooting, repair and
                                    maintenance services.
                                </p>
                                <a href="{{ route('Customer.request.create', ['service' => 'Computer & IT Support Service']) }}"
                                    class="btn btn-secondary">
                                    <i class="bi bi-clipboard-plus me-1"></i>Request Service
                                </a>
                            </div>
                        </div>
                    </div>




                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="mb-3">
                                    <i class="bi bi-lightning-charge fs-1 text-warning"></i>
                                </div>
                                <h5 class="fw-bold">Electrical Service</h5>
                                <p class="text-muted">Electrical inspection, repair and maintenance services.</p>
                                <a href="{{ route('Customer.request.create', ['service' => 'Electrical Service']) }}"
                                    class="btn btn-secondary">Request Service
                                </a>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="mb-3">
                                    <i class="bi bi-droplet fs-1 text-info"></i>
                                </div>
                                <h5 class="fw-bold">Plumbing Service</h5>
                                <p class="text-muted">Plumbing installation, repair and maintenance services.</p>
                                <a href="{{ route('Customer.request.create', ['service' => 'Plumbing Service']) }}"
                                    class="btn btn-secondary">
                                    Request Service
                                </a>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="mb-3">
                                    <i class="bi bi-gear fs-1 text-secondary"></i>
                                </div>
                                <h5 class="fw-bold">Construction & Technical Support</h5>
                                <p class="text-muted">Professional Construction & Technical support and troubleshooting
                                    services.</p>
                                <a href="{{ route('Customer.request.create', ['service' => 'Construction & Technical Support']) }}"
                                    class="btn btn-secondary">
                                    Request Service
                                </a>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="mb-3">
                                    <i class="bi bi-house-gear fs-1 text-danger"></i>
                                </div>
                                <h5 class="fw-bold">Cleaning & Maintenance Service</h5>
                                <p class="text-muted">Regular Cleaning & Maintenance and inspection services.</p>
                                <a href="{{ route('Customer.request.create', ['service' => '>Cleaning & Maintenance Service']) }}"
                                    class="btn btn-secondary">
                                    Request Service
                                </a>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="mb-3">
                                    <i class="bi-person-badge fs-1 text-success"></i>
                                </div>
                                <h5 class="fw-bold">Security Service</h5>
                                <p class="text-muted">Security services, inspection and maintenance services.</p>
                                <a href="{{ route('Customer.request.create', ['service' => 'Security Service']) }}"
                                    class="btn btn-secondary">
                                    Request Service
                                </a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </main>
    </div>
@endsection
