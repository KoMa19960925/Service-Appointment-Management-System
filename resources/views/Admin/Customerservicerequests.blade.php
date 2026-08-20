@extends('layouts.app')

@section('content')
    <div class="d-flex" style="min-height: 100vh">


        <nav class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 250px" data-bs-theme="dark">

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

            <div class="mb-3 text-white">
                <div class="d-flex align-items-center">
                    <i class="bi bi-person-circle me-2 fs-4"></i>
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



        <main class="flex-grow-1 p-4 bg-light">
            <div class="container-fluid">
                <div class="mb-4">
                    <h2 class="fw-bold">
                        Customer Service Requests
                    </h2>
                    <p class="text-muted">
                        View and manage all customer service requests.
                    </p>

                </div>


 @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="bi bi-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert">
                        </button>
                    </div>
                @endif


                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold mb-0">
                                Service Request Details
                            </h5>
                            <span class="badge bg-primary">
                                {{ $servicerequests->count() }} Requests
                            </span>
                        </div>



                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Customer</th>
                                        <th>Service Name</th>
                                        <th>Service Description</th>
                                        <th>Request Date</th>
                                        <th>Request Time</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse($servicerequests as $servicerequest)
                                        <tr>
                                            <td>{{ $servicerequest->id }}</td>
                                            <td>{{ $servicerequest->name }}</td>
                                            <td>{{ $servicerequest->service_name }}</td>
                                            <td>{{ $servicerequest->description }}</td>
                                            <td>{{ $servicerequest->request_date }}</td>
                                            <td>{{ $servicerequest->request_time }}</td>
                                            <td>

                                                <button type="button"class="btn btn-primary btn-sm">View</button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center py-4">
                                                <p class="text-muted mb-0 mt-2">
                                                    No customer service requests found.
                                                </p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
