@extends('layouts.Technicianapp')

@section('content')



    <main class="flex-grow-1 p-4 bg-light">
        <div class="container-fluid">
            <div class="mb-4">
                <h2 class="fw-bold">My Payments</h2>
                <p class="text-muted">
                    View payments received for your completed service work.
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


            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert">
                    </button>
                </div>
            @endif


            <div class="row g-4 mb-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-muted mb-1">
                                        Total Payment
                                    </p>
                                    <h3 class="fw-bold mb-0">
                                        Rs.{{ number_format($payments->sum(fn($item) => $item->payment?->amount ?? 0), 2) }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Customer</th>
                                        <th>Service</th>
                                        <th>Service Status</th>
                                        <th>Payment Date</th>
                                        <th>Amount</th>
                                        <th>Payment Status</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @forelse($payments as $payment)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if ($payment->serviceRequest)
                                                    <strong>{{ $payment->serviceRequest->name }}</strong>
                                                @else
                                                    <span class="text-muted">
                                                        -
                                                    </span>
                                                @endif
                                            </td>


                                            <td>
                                                @if ($payment->serviceRequest)
                                                    {{ $payment->serviceRequest->service_name }}
                                                @else
                                                    <span class="text-muted">
                                                        -
                                                    </span>
                                                @endif
                                            </td>



                                            <td>
                                                <span class="badge bg-success">
                                                    <i class="bi bi-check-circle me-1"></i>
                                                    Completed
                                                </span>
                                            </td>


                                            <td>
                                                @if ($payment->payment)
                                                    @if ($payment->payment->created_at)
                                                        {{ $payment->payment->created_at->format('d M Y') }}
                                                    @else
                                                        -
                                                    @endif
                                                @else
                                                    <span class="text-muted">
                                                        -
                                                    </span>
                                                @endif
                                            </td>


                                            <td>
                                                @if ($payment->payment)
                                                    <strong class="text-success">
                                                        Rs.{{ number_format($payment->payment->amount, 2) }}
                                                    </strong>
                                                @else
                                                    <span class="text-muted">
                                                        Not Paid
                                                    </span>
                                                @endif
                                            </td>


                                            <td>
                                                @if ($payment->payment)
                                                    <span class="badge bg-success">
                                                        <i class="bi bi-check-circle me-1"></i>
                                                        Paid
                                                    </span>
                                                @else
                                                    <span class="badge bg-warning text-dark">
                                                        <i class="bi bi-hourglass-split me-1"></i>
                                                        Payment Pending
                                                    </span>
                                                @endif
                                            </td>

                                        </tr>


                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center py-5">
                                                <h5 class="text-muted mt-3">No payment records found.</h5>
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
