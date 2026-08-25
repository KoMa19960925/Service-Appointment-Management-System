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

        {{-- Admin Profile --}}
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


        {{-- Logout --}}
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

            {{-- Page Heading --}}
            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>

                    <h2 class="fw-bold mb-1">
                        All Technician Details
                    </h2>

                 

                </div>


                {{-- Add Technician --}}
                <a href="{{ route('Admin.createtechnician') }}"
                   class="btn btn-primary">

                    <i class="bi bi-person-plus me-2"></i>
                    Add Technician

                </a>

            </div>


            {{-- Success Message --}}
            @if(session('success'))

                <div class="alert alert-success alert-dismissible fade show">

                    {{ session('success') }}

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert">
                    </button>

                </div>

            @endif


            {{-- Error Message --}}
            @if(session('error'))

                <div class="alert alert-danger alert-dismissible fade show">

                    {{ session('error') }}

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert">
                    </button>

                </div>

            @endif


            {{-- Technician Table --}}
            <div class="card border-0 shadow-sm">



                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-hover align-middle">

                            <thead class="table-dark">

                                <tr>

                                    <th>#</th>

                                    <th>Technician Name</th>

                                    <th>Phone</th>

                                    <th>Work Experience</th>

                                    <th>Email</th>

                                    <th class="text-center">
                                        Actions
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse($technicians as $technician)

                                    <tr>

                                        {{-- ID --}}
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>


                                        {{-- Name --}}
                                        <td>

                                            <div class="d-flex align-items-center">

                                                

                                                <strong>
                                                    {{ $technician->name }}
                                                </strong>

                                            </div>

                                        </td>


                                        {{-- Phone --}}
                                        <td>
                                            {{ $technician->phone}}
                                        </td>


                                        {{-- Work Experience --}}
                                        <td>
                                            {{ $technician->work_experience}}
                                        </td>


                                        {{-- Email --}}
                                        <td>
                                            {{ $technician->email }}
                                        </td>


                                        {{-- Actions --}}
                                        <td class="text-center">

                                            <a href="#"
                                               class="btn btn-sm btn-primary">

                                                <i class="bi bi-eye me-1"></i>
                                                View

                                            </a>


                                            <a href="#"
                                               class="btn btn-sm btn-warning">

                                                <i class="bi bi-pencil-square me-1"></i>
                                                Edit

                                            </a>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="6"
                                            class="text-center py-5">

                                     

                                            <h6 class="mt-3 text-muted">
                                                No technicians found.
                                            </h6>

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
