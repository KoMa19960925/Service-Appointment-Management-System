@extends('layouts.Customerapp')

@section('content')
    <main class="flex-grow-1 p-4 bg-light">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-4 no-print">
                <div>
                    <h2 class="fw-bold mb-1">All Service History</h2>
                </div>


                <button type="button" class="btn btn-dark" onclick="window.print()">
                    <i class="bi bi-printer me-2"></i>Print
                </button>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show no-print">
                    <i class="bi bi-check-circle me-2"></i>
                    {{ session('success') }}

                    <button type="button" class="btn-close" data-bs-dismiss="alert">
                    </button>
                </div>
            @endif


            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show no-print">
                    <i class="bi bi-exclamation-circle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert">
                    </button>
                </div>
            @endif


            <div id="serviceHistoryPrintArea" class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h5 class="fw-bold mb-1"></h5>
                          
                        </div>
                        <span class="badge bg-primary">
                            {{ $servicehistories->count() }}
                            {{ $servicehistories->count() == 1 ? 'Service' : 'Services' }}
                        </span>
                    </div>


                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Service</th>
                                    <th>Description</th>
                                    <th>Request Date</th>
                                    <th>Request Time</th>
                                    <th>Technician</th>
                                    <th>Assignment Date</th>
                                    <th>Assignment Time</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($servicehistories as $servicehistory)
                                    @php
                                        $serviceRequest = $servicehistory->serviceRequest;
                                        $technician = $servicehistory->technician;
                                        $status = strtolower($servicehistory->status ?? 'pending');
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><strong>{{ $serviceRequest->service_name ?? 'N/A' }}</strong></td>
                                        <td>{{ $serviceRequest->description ?? 'N/A' }}</td>

                                        <td>
                                            @if ($serviceRequest && $serviceRequest->request_date)
                                                <span class="badge bg-secondary">
                                                    <i class="bi bi-calendar3 me-1"></i>
                                                    {{ \Carbon\Carbon::parse($serviceRequest->request_date)->format('Y-m-d') }}
                                                </span>
                                            @else
                                                <span class="text-muted">N/A</span>
                                            @endif
                                        </td>


                                        <td>
                                            @if ($serviceRequest && $serviceRequest->request_time)
                                                <span class="badge bg-secondary">
                                                    <i class="bi bi-clock me-1"></i>
                                                    {{ \Carbon\Carbon::parse($serviceRequest->request_time)->format('H:i') }}
                                                </span>
                                            @else
                                                <span class="text-muted">N/A</span>
                                            @endif
                                        </td>


                                        <td>
                                            @if ($technician)
                                                <strong>
                                                    {{ $technician->name }}
                                                </strong>

                                            @else
                                                <span class="text-muted">
                                                    Not Assigned
                                                </span>
                                            @endif
                                        </td>


                                        <td>
                                            @if ($servicehistory->assigned_date)
                                                <span class="badge bg-primary">
                                                    <i class="bi bi-calendar-check me-1"></i>
                                                    {{ \Carbon\Carbon::parse($servicehistory->assigned_date)->format('Y-m-d') }}
                                                </span>
                                            @else
                                                <span class="text-muted">
                                                    Not Assigned
                                                </span>
                                            @endif
                                        </td>

                                        <td>
                                            @if ($servicehistory->assigned_time)
                                                <span class="badge bg-primary">
                                                    <i class="bi bi-clock me-1"></i>
                                                    {{ \Carbon\Carbon::parse($servicehistory->assigned_time)->format('H:i') }}
                                                </span>
                                            @else
                                                <span class="text-muted">
                                                    Not Assigned
                                                </span>
                                            @endif
                                        </td>

                                        <td>
                                            @if ($status === 'pending')
                                                <span class="badge bg-warning text-dark">
                                                    <i class="bi bi-hourglass-split me-1"></i>
                                                    Pending
                                                </span>
                                            @elseif($status === 'scheduled')
                                                <span class="badge bg-primary">
                                                    <i class="bi bi-clock me-1"></i>
                                                    Scheduled
                                                </span>
                                            @elseif($status === 'completed')
                                                <span class="badge bg-success">
                                                    <i class="bi bi-check-circle me-1"></i>
                                                    Completed
                                                </span>
                                            @else
                                                <span class="badge bg-secondary">
                                                    {{ ucfirst($servicehistory->status ?? 'Unknown') }}
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty


                                    <tr>
                                        <td colspan="9" class="text-center py-5">
                                            <h6 class="text-muted mt-3">
                                                No service history found.
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
