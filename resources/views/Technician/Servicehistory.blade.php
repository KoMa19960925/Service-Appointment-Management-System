@extends('layouts.Technicianapp')

@section('content')


    <main class="flex-grow-1 p-4 bg-light">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>
                    <h2 class="fw-bold mb-1">
                        Completed Service History
                    </h2>
                </div>


                <button type="button" class="btn btn-dark" onclick="printServiceHistory()">
                    <i class="bi bi-printer me-2"></i>Print
                </button>
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
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert">
                    </button>
                </div>
            @endif


            <div id="serviceHistoryPrintArea" class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h5 class="fw-bold mb-1">

                            </h5>
                        </div>


                        <span class="badge bg-primary">
                            {{ $servicehistories->count() }}
                            Services
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
                                    <th>Assignment Date</th>
                                    <th>Assignment Time</th>
                                    <th>Work Proof</th>
                                    <th>Payment Date</th>
                                    <th>Payment</th>
                                    <th>Service Status</th>
                                </tr>
                            </thead>


                            <tbody>
                                @forelse($servicehistories as $servicehistory)
                                    @php
                                        $serviceRequest = $servicehistory->serviceRequest;
                                        $payment = $servicehistory->payment;
                                    @endphp


                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($serviceRequest)
                                                <strong>
                                                    {{ $serviceRequest->name ?? '-' }}
                                                </strong>
                                            @else
                                                <span class="text-muted">
                                                    -
                                                </span>
                                            @endif
                                        </td>

                                        <td>
                                            @if ($serviceRequest)
                                                <span class="fw-semibold">
                                                    {{ $serviceRequest->service_name ?? '-' }}
                                                </span>
                                            @else
                                                <span class="text-muted">
                                                    -
                                                </span>
                                            @endif
                                        </td>


                                        <td style="min-width: 220px">
                                            @if ($serviceRequest)
                                                {{ $serviceRequest->description ?? '-' }}
                                            @else
                                                <span class="text-muted">
                                                    -
                                                </span>
                                            @endif
                                        </td>


                                        <td>
                                            @if ($serviceRequest && $serviceRequest->request_date)
                                                <span class="badge bg-secondary">
                                                    <i class="bi bi-calendar3 me-1"></i>
                                                    {{ $serviceRequest->request_date }}
                                                </span>
                                            @else
                                                -
                                            @endif
                                        </td>


                                        <td>
                                            @if ($serviceRequest && $serviceRequest->request_time)
                                                <span class="badge bg-secondary">
                                                    <i class="bi bi-clock me-1"></i>
                                                    {{ $serviceRequest->request_time }}
                                                </span>
                                            @else
                                                -
                                            @endif
                                        </td>


                                        <td>
                                            @if ($servicehistory->assigned_date)
                                                <span class="badge bg-primary">
                                                    <i class="bi bi-calendar-check me-1"></i>
                                                    {{ $servicehistory->assigned_date }}
                                                </span>
                                            @else
                                                -
                                            @endif
                                        </td>


                                        <td>
                                            @if ($servicehistory->assigned_time)
                                                <span class="badge bg-primary">
                                                    <i class="bi bi-clock me-1"></i>
                                                    {{ $servicehistory->assigned_time }}
                                                </span>
                                            @else
                                                -
                                            @endif
                                        </td>


                                        <td style="min-width: 190px">
                                            @if ($servicehistory->image_1 || $servicehistory->image_2)
                                                <div class="d-flex gap-2">

                                                    @if ($servicehistory->image_1)
                                                        <a href="{{ asset('storage/' . $servicehistory->image_1) }}"
                                                            target="_blank">

                                                            <img src="{{ asset('storage/' . $servicehistory->image_1) }}"
                                                                alt="Work Proof Image 1" class="rounded border"
                                                                style="
                                                                    width:75px;
                                                                    height:60px;
                                                                    object-fit:cover;">
                                                        </a>
                                                    @endif



                                                    @if ($servicehistory->image_2)
                                                        <a href="{{ asset('storage/' . $servicehistory->image_2) }}"
                                                            target="_blank">

                                                            <img src="{{ asset('storage/' . $servicehistory->image_2) }}"
                                                                alt="Work Proof Image 2" class="rounded border"
                                                                style="
                                                                    width:75px;
                                                                    height:60px;
                                                                    object-fit:cover;">
                                                        </a>
                                                    @endif
                                                </div>


                                                <small class="text-muted d-block mt-1">
                                                    Click image to view
                                                </small>
                                            @else
                                                <span class="text-muted">
                                                    No proof uploaded
                                                </span>
                                            @endif
                                        </td>



                                        <td>
                                            @if ($payment && $payment->created_at)
                                                <span class="badge bg-info text-dark">
                                                    <i class="bi bi-calendar-check me-1"></i>
                                                    {{ $payment->created_at->format('d M Y') }}
                                                </span>
                                            @else
                                                <span class="text-muted">Not Paid</span>
                                            @endif
                                        </td>


                                        <td>
                                            @if ($payment)
                                                <span class="badge bg-success">
                                                    <i class="bi bi-check-circle me-1"></i> Paid
                                                </span>
                                                <div class="mt-1">
                                                    <strong class="text-success">
                                                        Rs.{{ number_format($payment->amount, 2) }}
                                                    </strong>
                                                </div>
                                            @else
                                                <span class="badge bg-warning text-dark">
                                                    <i class="bi bi-hourglass-split me-1"></i>
                                                    Payment Pending
                                                </span>
                                            @endif
                                        </td>



                                        <td>
                                            @if ($servicehistory->status === 'Completed')
                                                <span class="badge bg-success">
                                                    <i class="bi bi-check-circle me-1"></i>
                                                    Completed
                                                </span>
                                            @elseif($servicehistory->status === 'Scheduled')
                                                <span class="badge bg-primary">
                                                    <i class="bi bi-clock me-1"></i>
                                                    Scheduled
                                                </span>
                                            @elseif($servicehistory->status === 'Pending')
                                                <span class="badge bg-warning text-dark">
                                                    <i class="bi bi-hourglass-split me-1"></i>
                                                    Pending
                                                </span>
                                            @else
                                                <span class="badge bg-secondary">
                                                    {{ $servicehistory->status ?? '-' }}
                                                </span>
                                            @endif
                                        </td>
                                    </tr>


                                @empty
                                    <tr>
                                        <td colspan="12" class="text-center py-5">
                                            <h5 class="text-muted mt-3">
                                                No service history found.
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
