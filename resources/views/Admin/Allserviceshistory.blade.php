@extends('layouts.Adminapp')

@section('content')



    <main class="flex-grow-1 p-4 bg-light">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold">
                        All Service Records
                    </h2>
                    <p class="text-muted mb-0">
                        View complete service history
                    </p>
                </div>


                <button type="button" onclick="printServiceHistory()" class="btn btn-dark">
                    <i class="bi bi-printer me-2"></i>
                    Print
                </button>

            </div>



            <div id="serviceHistoryPrintArea" class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold mb-0"></h5>
                        <span class="badge bg-primary">
                            {{ $servicehistories->count() }} Services
                        </span>
                    </div>



                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Customer</th>
                                    <th>Service</th>
                                    <th>Description</th>
                                    <th>Request Date</th>
                                    <th>Request Time</th>
                                    <th>Technician</th>
                                    <th>Assignment Date</th>
                                    <th>Assignment Time</th>
                                    <th>Work Proof</th>
                                    <th>Technician Payment</th>
                                    <th>Service Status</th>
                                </tr>
                            </thead>


                            <tbody>
                                @forelse($servicehistories as $history)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>

                                            <strong>
                                                {{ $history->serviceRequest->name ?? 'N/A' }}
                                            </strong>

                                        </td>

                                        <td>
                                            {{ $history->serviceRequest->service_name ?? 'N/A' }}
                                        </td>


                                        <td>
                                            {{ $history->serviceRequest->description ?? 'N/A' }}
                                        </td>


                                        <td>

                                            @if ($history->serviceRequest?->request_date)
                                                {{ \Carbon\Carbon::parse($history->serviceRequest->request_date)->format('Y-m-d') }}
                                            @else
                                                N/A
                                            @endif

                                        </td>


                                        <td>
                                            @if ($history->serviceRequest?->request_time)
                                                {{ $history->serviceRequest->request_time }}
                                            @else
                                                N/A
                                            @endif
                                        </td>



                                        <td>
                                            @if ($history->technician)
                                                <strong>
                                                    {{ $history->technician->name }}
                                                </strong>
                                            @else
                                                N/A
                                            @endif

                                        </td>



                                        <td>

                                            @if ($history->assigned_date)
                                                {{ \Carbon\Carbon::parse($history->assigned_date)->format('Y-m-d') }}
                                            @else
                                                N/A
                                            @endif
                                        </td>



                                        <td>
                                            {{ $history->assigned_time ?? 'N/A' }}
                                        </td>



                                        <td>
                                            @if ($history->image_1 || $history->image_2)
                                                <div class="d-flex gap-1">
                                                    @if ($history->image_1)
                                                        <a href="{{ asset('storage/' . $history->image_1) }}"
                                                            target="_blank" class="btn btn-warning btn-sm">
                                                            <i class="bi bi-image"></i>
                                                            View
                                                        </a>
                                                    @endif


                                                    @if ($history->image_2)
                                                        <a href="{{ asset('storage/' . $history->image_2) }}"
                                                            target="_blank" class="btn btn-warning btn-sm">
                                                            <i class="bi bi-image"></i>
                                                            View
                                                        </a>
                                                    @endif
                                                </div>
                                            @else
                                                <span class="text-muted">
                                                    No proof
                                                </span>
                                            @endif
                                        </td>




                                        <td>
                                            @if ($history->payment && $history->payment->payment_status === 'Paid')
                                                <span class="badge bg-success">
                                                    <i class="bi bi-check-circle me-1"></i>
                                                    Paid
                                                </span>

                                                <div class="small mt-1">
                                                    Rs. {{ number_format($history->payment->amount, 2) }}
                                                </div>
                                            @elseif ($history->payment && $history->payment->payment_status === 'Pending')
                                                <span class="badge bg-warning text-dark">
                                                    <i class="bi bi-hourglass-split me-1"></i>
                                                    Pending
                                                </span>
                                            @else
                                                <span class="badge bg-secondary">
                                                    Not Submitted
                                                </span>
                                            @endif
                                        </td>

                                        <td>
                                            @if ($history->status === 'Completed')
                                                <span class="badge bg-success">
                                                    <i class="bi bi-check-circle me-1"></i>
                                                    Completed
                                                </span>
                                            @elseif($history->status === 'Scheduled')
                                                <span class="badge bg-primary">
                                                    <i class="bi bi-clock me-1"></i>
                                                    Scheduled
                                                </span>
                                            @else
                                                <span class="badge bg-warning text-dark">
                                                    {{ $history->status }}
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty

                                    <tr>
                                        <td colspan="12" class="text-center py-5">
                                            <h5 class="text-muted mt-3">
                                                No service records found.

                                            </h5>
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
