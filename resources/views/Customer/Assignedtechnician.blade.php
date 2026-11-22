@extends('layouts.Customerapp')

@section('content')
    <main class="flex-grow-1 p-4 bg-light">
        <div class="container-fluid">

            <div class="mb-4">
                <h2 class="fw-bold">
                    Technician Assigned
                </h2>
                <p class="text-muted mb-0">
                    View your scheduled service and technician details.
                </p>
            </div>


            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <i class="bi bi-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif


            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Service Name</th>
                                    <th>Description</th>
                                    <th>Request Date</th>
                                    <th>Request Time</th>
                                    <th>Technician</th>
                                    <th>Assignment Date</th>
                                    <th>Assignment Time</th>
                                    <th>Work Proof</th>
                                    <th>Status</th>
                                </tr>
                            </thead>


                            <tbody>
                                @forelse($assignedtechnicians as $assignedtechnician)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>
                                            <strong>
                                                {{ $assignedtechnician->serviceRequest->service_name ?? '-' }}
                                            </strong>
                                        </td>

                                        <td>
                                            {{ $assignedtechnician->serviceRequest->description ?? '-' }}
                                        </td>

                                        <td>
                                            @if ($assignedtechnician->serviceRequest)
                                                <span class="badge bg-secondary">
                                                    <i class="bi bi-calendar3 me-1"></i>
                                                    {{ $assignedtechnician->serviceRequest->request_date }}
                                                </span>
                                            @else
                                                -
                                            @endif
                                        </td>


                                        <td>
                                            @if ($assignedtechnician->serviceRequest)
                                                <span class="badge bg-secondary">
                                                    <i class="bi bi-clock me-1"></i>
                                                    {{ $assignedtechnician->serviceRequest->request_time }}
                                                </span>
                                            @else
                                                -
                                            @endif
                                        </td>


                                        <td>
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-person-check-fill text-success fs-5 me-2"></i>
                                                <div>
                                                    <strong>
                                                        {{ $assignedtechnician->technician->name ?? '-' }}
                                                    </strong>
                                                </div>
                                            </div>
                                        </td>



                                        <td>
                                            @if ($assignedtechnician->assigned_date)
                                                <span class="badge bg-primary">
                                                    <i class="bi bi-calendar-check me-1"></i>
                                                    {{ \Carbon\Carbon::parse($assignedtechnician->assigned_date)->format('Y-m-d') }}
                                                </span>
                                            @else
                                                -
                                            @endif
                                        </td>


                                        <td>
                                            @if ($assignedtechnician->assigned_time)
                                                <span class="badge bg-primary">
                                                    <i class="bi bi-clock me-1"></i>
                                                    {{ \Carbon\Carbon::parse($assignedtechnician->assigned_time)->format('H:i') }}
                                                </span>
                                            @else
                                                -
                                            @endif
                                        </td>

                                        <td style="min-width: 220px;">
                                            @if ($assignedtechnician->image_1 && $assignedtechnician->image_2)
                                                <div class="d-flex gap-2 flex-wrap">

                                                    <a href="{{ asset('storage/' . $assignedtechnician->image_1) }}"
                                                        target="_blank" class="btn btn-sm btn-warning">
                                                        <i class="bi bi-image me-1"></i>
                                                        Image 1
                                                    </a>



                                                    <a href="{{ asset('storage/' . $assignedtechnician->image_2) }}"
                                                        target="_blank" class="btn btn-sm btn-warning">
                                                        <i class="bi bi-image me-1"></i>
                                                        Image 2
                                                    </a>
                                                </div>
                                            @else
                                                <div class="border rounded p-3 text-center bg-light">
                                                    <i class="bi bi-images fs-3 text-muted"></i>
                                                    <div class="small text-muted mt-1">
                                                        Completed work images
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($assignedtechnician->status === 'Scheduled')
                                                <span class="badge bg-primary">
                                                    <i class="bi bi-clock me-1"></i>
                                                    Scheduled
                                                </span>
                                            @elseif($assignedtechnician->status === 'Completed')
                                                <span class="badge bg-success">
                                                    <i class="bi bi-check-circle me-1"></i>
                                                    Completed
                                                </span>
                                            @elseif($assignedtechnician->status === 'Pending')
                                                <span class="badge bg-warning text-dark">
                                                    <i class="bi bi-hourglass-split me-1"></i>
                                                    Pending
                                                </span>
                                            @else
                                                <span class="badge bg-secondary">

                                                    {{ $assignedtechnician->status ?? 'Pending' }}

                                                </span>
                                            @endif
                                        </td>

                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center py-5">
                                            <h6 class="mt-3 text-muted">
                                                No technician assigned yet.
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
@endsection
