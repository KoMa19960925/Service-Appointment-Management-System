@extends('layouts.Technicianapp')

@section('content')

    <main class="flex-grow-1 p-4 bg-light">

        <div class="container-fluid">

            {{-- Page Header --}}
            <div class="mb-4">

                <h2 class="fw-bold">
                    My Payments
                </h2>

                <p class="text-muted">
                    View payment status and submitted work details.
                </p>

            </div>


         
            @if (session('success'))

                <div class="alert alert-success alert-dismissible fade show">

                    <i class="bi bi-check-circle me-2"></i>

                    {{ session('success') }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                    </button>

                </div>

            @endif


            {{-- Error Message --}}
            @if (session('error'))

                <div class="alert alert-danger alert-dismissible fade show">

                    <i class="bi bi-exclamation-triangle me-2"></i>

                    {{ session('error') }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                    </button>

                </div>

            @endif


            {{-- Total Payment --}}
            <div class="row g-4 mb-4">

                <div class="col-md-4">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body p-4">

                            <p class="text-muted mb-1">
                                Total Payment Received
                            </p>

                            <h3 class="fw-bold mb-0">

                                Rs.{{ number_format(
                                    $payments
                                        ->filter(
                                            fn($item) =>
                                                $item->payment?->payment_status === 'Paid'
                                        )
                                        ->sum(
                                            fn($item) =>
                                                $item->payment?->amount ?? 0
                                        ),
                                    2
                                ) }}

                            </h3>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Payment Table --}}
            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-hover align-middle">

                            <thead class="table-dark">

                                <tr>

                                    <th>No</th>

                                    <th>Customer</th>

                                    <th>Service</th>

                                    <th>Service Status</th>

                                    <th>Payment Date</th>

                                    <th>Amount</th>

                                    <th>Payment Status</th>

                                    <th>Action</th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse($payments as $payment)

                                    <tr>

                                        {{-- # --}}
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>


                                        {{-- Customer --}}
                                        <td>

                                            @if ($payment->serviceRequest)

                                                <strong>
                                                    {{ $payment->serviceRequest->name }}
                                                </strong>

                                            @else

                                                <span class="text-muted">
                                                    -
                                                </span>

                                            @endif

                                        </td>


                                        {{-- Service --}}
                                        <td>

                                            @if ($payment->serviceRequest)

                                                {{ $payment->serviceRequest->service_name }}

                                            @else

                                                <span class="text-muted">
                                                    -
                                                </span>

                                            @endif

                                        </td>


                                        {{-- Service Status --}}
                                        <td>

                                            @if (
                                                $payment->payment &&
                                                $payment->payment->payment_status === 'Paid'
                                            )

                                                <span class="badge bg-success">

                                                    <i class="bi bi-check-circle me-1"></i>

                                                    Completed

                                                </span>

                                            @else

                                                <span class="badge bg-warning text-dark">

                                                    <i class="bi bi-hourglass-split me-1"></i>

                                                    Payment Pending

                                                </span>

                                            @endif

                                        </td>


                                        {{-- Payment Date --}}
                                        <td>

                                            @if (
                                                $payment->payment &&
                                                $payment->payment->payment_status === 'Paid'
                                            )

                                                @if ($payment->payment->paid_at)

                                                    {{ $payment->payment->paid_at->format('d M Y') }}

                                                @else

                                                    -

                                                @endif

                                            @else

                                                <span class="text-muted">
                                                    -
                                                </span>

                                            @endif

                                        </td>


                                        {{-- Amount --}}
                                        <td>

                                            @if (
                                                $payment->payment &&
                                                $payment->payment->payment_status === 'Paid'
                                            )

                                                <strong class="text-success">

                                                    Rs.{{ number_format(
                                                        $payment->payment->amount,
                                                        2
                                                    ) }}

                                                </strong>

                                            @else

                                                <span class="text-muted">
                                                    Not Paid
                                                </span>

                                            @endif

                                        </td>


                                        {{-- Payment Status --}}
                                        <td>

                                            @if (
                                                $payment->payment &&
                                                $payment->payment->payment_status === 'Paid'
                                            )

                                                <span class="badge bg-success">

                                                    <i class="bi bi-check-circle me-1"></i>

                                                    Paid

                                                </span>

                                            @else

                                                <span class="badge bg-warning text-dark">

                                                    <i class="bi bi-hourglass-split me-1"></i>

                                                    Pending

                                                </span>

                                            @endif

                                        </td>


                                        {{-- Action --}}
                                        <td>

                                            @if (!$payment->payment)

                                                {{-- No details submitted yet --}}
                                                <a
                                                    href="{{ route(
                                                        'Technician.paymentdetails',
                                                        $payment->id
                                                    ) }}"
                                                    class="btn btn-sm btn-dark">

                                                    <i class="bi bi-file-earmark-plus me-1"></i>

                                                    Add Work Details

                                                </a>

                                            @else

                                                {{-- Details already submitted --}}
                                                <a
                                                    href="{{ route(
                                                        'Technician.paymentdetails',
                                                        $payment->id
                                                    ) }}"
                                                    class="btn btn-sm btn-primary">

                                                    <i class="bi bi-eye me-1"></i>

                                                    View Details

                                                </a>

                                            @endif

                                        </td>

                                    </tr>


                                @empty

                                    <tr>

                                        <td
                                            colspan="8"
                                            class="text-center py-5">

                                            <i
                                                class="bi bi-wallet2 fs-1 text-muted">
                                            </i>

                                            <h5 class="text-muted mt-3">

                                                No payment records found.

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