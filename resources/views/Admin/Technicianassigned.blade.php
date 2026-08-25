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

            <button type="submit"
                    class="btn btn-danger w-100">

                <i class="bi bi-box-arrow-right me-2"></i>

                Logout

            </button>

        </form>

    </nav>


    {{-- Main Content --}}
    <main class="flex-grow-1 p-4 bg-light">

        <div class="container-fluid">

            {{-- Heading --}}
            <div class="mb-4">

                <h2 class="fw-bold">
                    Technician Assigned
                </h2>

                <p class="text-muted">
                    Assign technicians to customer service requests.
                </p>

            </div>


            {{-- Success --}}
            @if(session('success'))

                <div class="alert alert-success alert-dismissible fade show">

                    {{ session('success') }}

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert">
                    </button>

                </div>

            @endif


            {{-- Error --}}
            @if(session('error'))

                <div class="alert alert-danger alert-dismissible fade show">

                    {{ session('error') }}

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert">
                    </button>

                </div>

            @endif


            {{-- Validation Errors --}}
            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- Service Requests --}}
            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-hover align-middle">

                            <thead class="table-dark">

                                <tr>

                                    <th>#</th>

                                    <th>Customer Name</th>

                                    <th>Service Name</th>

                                    <th>Description</th>

                                    <th>Technician</th>

                                    <th>Date</th>

                                    <th>Time</th>

                                    <th>Status</th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse($servicerequests as $servicerequest)

                                    <tr>

                                        {{-- ID --}}
                                        <td>
                                            {{ $servicerequest->id }}
                                        </td>


                                        {{-- Customer --}}
                                        <td>
                                            <strong>
                                                {{ $servicerequest->name }}
                                            </strong>
                                        </td>


                                        {{-- Service --}}
                                        <td>
                                            {{ $servicerequest->service_name }}
                                        </td>


                                        {{-- Description --}}
                                        <td>
                                            {{ $servicerequest->description }}
                                        </td>


                                        {{-- Technician --}}
                                        <td>

                                            @if($servicerequest->assignedTechnician)

                                                <strong>
                                                    {{ $servicerequest->assignedTechnician->technician->name }}
                                                </strong>

                                            @else

                                                <form
                                                    action="{{ route(
                                                        'Admin.assignTechnician',
                                                        $servicerequest->id
                                                    ) }}"
                                                    method="POST">

                                                    @csrf

                                                    <div class="d-flex gap-2">

                                                        <select
                                                            name="technician_id"
                                                            class="form-select form-select-sm"
                                                            required>

                                                            <option value="">
                                                                Select Technician
                                                            </option>

                                                            @foreach($technicians as $technician)

                                                                <option value="{{ $technician->id }}">
                                                                    {{ $technician->name }}
                                                                </option>

                                                            @endforeach

                                                        </select>


                                                        <button
                                                            type="submit"
                                                            class="btn btn-sm btn-primary">

                                                            <i class="bi bi-person-check"></i>
                                                            Assign

                                                        </button>

                                                    </div>

                                                </form>

                                            @endif

                                        </td>

                                        {{-- Date --}}
                                        <td>
                                            {{ $servicerequest->request_date }}
                                        </td>


                                        {{-- Time --}}
                                        <td>
                                            {{ $servicerequest->request_time }}
                                        </td>



                                        {{-- Status --}}
                                        <td>

                                            @if($servicerequest->assignedTechnician)

                                                @if(
                                                    $servicerequest
                                                        ->assignedTechnician
                                                        ->status === 'Completed'
                                                )

                                                    <span class="badge bg-success">
                                                        Completed
                                                    </span>

                                                @else

                                                    <form
                                                        action="{{ route(
                                                            'Admin.updateTechnicianStatus',
                                                            $servicerequest->assignedTechnician->id
                                                        ) }}"
                                                        method="POST">

                                                        @csrf
                                                        @method('PUT')

                                                        <select
                                                            name="status"
                                                            class="form-select form-select-sm"
                                                            onchange="this.form.submit()">

                                                            <option
                                                                value="Scheduled"
                                                                selected>

                                                                Scheduled

                                                            </option>

                                                            <option
                                                                value="Completed">

                                                                Completed

                                                            </option>

                                                        </select>

                                                    </form>

                                                @endif

                                            @else

                                                <span class="badge bg-warning text-dark">
                                                    Pending
                                                </span>

                                            @endif

                                        </td>

                                    </tr>


                                @empty

                                    <tr>

                                        <td colspan="8"
                                            class="text-center py-5">

                                            <i class="bi bi-inbox fs-1 text-muted"></i>

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
   