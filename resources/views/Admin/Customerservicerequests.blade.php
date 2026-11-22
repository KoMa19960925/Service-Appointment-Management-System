@extends('layouts.Adminapp')

@section('content')
    <main class="flex-grow-1 p-4 bg-light">
        <div class="container-fluid">
            <div class="mb-4">
                <h2 class="fw-bold">All Customer Service Request Details</h2>
            </div>


            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <i class="bi bi-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert">
                    </button>
                </div>
            @endif




            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    <i class="bi bi-exclamation-circle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert">
                    </button>
                </div>
            @endif



            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                        </div>
                        <span class="badge bg-primary">{{ $servicerequests->count() }}
                            {{ $servicerequests->count() == 1 ? 'Request' : 'Requests' }}
                        </span>
                    </div>


                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Customer</th>
                                    <th>Customer Address</th>
                                    <th>Customer phone</th>
                                    <th>Service Name</th>
                                    <th>Service Description</th>
                                    <th>Request Date</th>
                                    <th>Request Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @forelse($servicerequests as $servicerequest)
                                    <tr>
                                        <td><strong>{{ $servicerequest->id }}</strong></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div><strong>{{ $servicerequest->name }}</strong></div>
                                            </div>
                                        </td>



                                        <td>
                                            <div>
                                                <strong>
                                                    {{ $servicerequest->address }}
                                                </strong>
                                                <br>
                                                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($servicerequest->address) }}"
                                                    target="_blank" class="text-primary text-decoration-none small">

                                                    <i class="bi bi-geo-alt-fill me-1"></i>
                                                    View Location
                                                </a>

                                            </div>
                                        </td>



                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div><strong>{{ $servicerequest->phone }}</strong></div>
                                            </div>
                                        </td>



                                        <td><span class="fw-semibold">{{ $servicerequest->service_name }}</span></td>
                                        <td><span>{{ $servicerequest->description }}</span></td>
                                        <td>{{ $servicerequest->request_date }}</td>
                                        <td>{{ $servicerequest->request_time }}</td>
                                        <td>

                                            @php $assignment = $servicerequest->assignedTechnician;@endphp

                                            @if (!$assignment)
                                                <span class="badge bg-warning text-dark">
                                                    <i class="bi bi-hourglass-split me-1"></i>Pending</span>
                                            @elseif($assignment->status === 'Scheduled')
                                                <span class="badge bg-primary">
                                                    <i class="bi bi-calendar-check me-1"></i>Scheduled
                                                </span>
                                            @elseif($assignment->status === 'Completed')
                                                <span class="badge bg-success">
                                                    <i class="bi bi-check-circle me-1"></i>Completed
                                                </span>
                                            @else
                                                <span class="badge bg-secondary">{{ $assignment->status }}</span>
                                            @endif
                                        </td>


                                        <td>
                                            <a href="{{ route('Admin.TechnicianAssigned') }}"
                                                class="btn btn-primary btn-sm">
                                                TechnicianAssigned
                                            </a>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-5">
                                            <h5 class="mt-3 text-muted">No Customer Service Requests</h5>
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
@endsection
