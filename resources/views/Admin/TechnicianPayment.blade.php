@extends('layouts.Adminapp')

@section('content')
    <main class="flex-grow-1 p-4 bg-light">
        <div class="container-fluid">
            <div class="mb-4">
                <h2 class="fw-bold">Technician Payments</h2>
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


            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Customer</th>
                                    <th>Service</th>
                                    <th>Technician</th>
                                    <th>Work Status</th>
                                    <th>Payment</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($assignments as $assignment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $assignment->serviceRequest->name }}</td>
                                        <td>{{ $assignment->serviceRequest->service_name }}</td>
                                        <td><strong>{{ $assignment->technician->name }}</strong>
                                            
                                        </td>
                                        <td><span class="badge bg-success"><i
                                                    class="bi bi-check-circle me-1"></i>Completed</span></td>
                                        <td>
                                            @if ($assignment->payment)
                                                <span class="badge bg-success"><i
                                                        class="bi bi-check-circle me-1"></i>Paid</span>

                                                <div class="small mt-1">
                                                    Rs.{{ number_format($assignment->payment->amount, 2) }}
                                                </div>
                                            @else
                                                <a href="{{ route('Admin.CreateTechnicianPayment', $assignment->id) }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="bi bi-cash-coin me-1"></i>Pay Technician
                                                </a>
                                            @endif
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-5">
                                            <h5 class="text-muted mt-3">
                                                No completed services available for payment.
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
    </div>
@endsection
