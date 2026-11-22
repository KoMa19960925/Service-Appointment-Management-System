@extends('layouts.Technicianapp')

@section('content')


    <main class="flex-grow-1 p-4 bg-light">
        <div class="container-fluid">


            <div class="mb-4">
                <h2 class="fw-bold"> Assigned Services</h2>

                <p class="text-muted mb-0">
                    View your assigned service requests and upload work completion proof.
                </p>
            </div>



            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <i class="bi bi-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button"class="btn-close" data-bs-dismiss="alert">
                    </button>
                </div>
            @endif


            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    <i class="bi bi-exclamation-circle me-2"></i>
                    {{ session('error') }}
                    <button type="button"class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif



            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show">
                    <strong>Please fix the following errors:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert">
                    </button>
                </div>
            @endif




            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold mb-0"></h5>
                        <span class="badge bg-primary">
                            {{ $assignedtechnicians->count() }} Services
                        </span>
                    </div>


                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th>Customer Name</th>
                                    <th>Customer Address</th>
                                    <th>Customer phone</th>
                                    <th>Service Name</th>
                                    <th>Description</th>
                                    <th>Customer Request Date</th>
                                    <th>Customer Request Time</th>
                                    <th>Assignment Date</th>
                                    <th>Assignment Time</th>
                                    <th>Work Proof</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @forelse($assignedtechnicians as $assignedtechnician)
                                    @php
                                        $serviceRequest = $assignedtechnician->serviceRequest;
                                    @endphp

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><strong>{{ $serviceRequest->name ?? '-' }}</strong></td>


                                        <td>
                                            <div>
                                                <strong>
                                                    {{ $serviceRequest->address ?? '-' }}
                                                </strong>
                                                @if ($serviceRequest && $serviceRequest->address)
                                                    <br>
                                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($serviceRequest->address) }}"
                                                        target="_blank" class="text-primary text-decoration-none small">
                                                        <i class="bi bi-geo-alt-fill me-1"></i>
                                                        View Location
                                                    </a>
                                                @endif
                                            </div>
                                        </td>


                                        <td>{{ $serviceRequest->phone ?? '-' }}</td>
                                        <td>{{ $serviceRequest->service_name ?? '-' }}</td>
                                        <td style="min-width: 180px">{{ $serviceRequest->description ?? '-' }}</td>




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
                                            @if ($assignedtechnician->assigned_date)
                                                <span class="badge bg-primary">
                                                    <i class="bi bi-calendar-check me-1"></i>
                                                    {{ $assignedtechnician->assigned_date }}
                                                </span>
                                            @else
                                                -
                                            @endif
                                        </td>


                                        <td>

                                            @if ($assignedtechnician->assigned_time)
                                                <span class="badge bg-primary">
                                                    <i class="bi bi-clock me-1"></i>
                                                    {{ $assignedtechnician->assigned_time }}
                                                </span>
                                            @else
                                                -
                                            @endif
                                        </td>


                                        <td style="min-width: 280px">
                                            @if ($assignedtechnician->image_1 && $assignedtechnician->image_2)
                                                <div class="d-flex gap-2 mb-2">
                                                    <div class="text-center">
                                                        <a href="{{ asset('storage/' . $assignedtechnician->image_1) }}"
                                                            target="_blank">

                                                            <img src="{{ asset('storage/' . $assignedtechnician->image_1) }}"
                                                                alt="Work Proof Image 1" class="rounded border"
                                                                style="
                                                                    width: 90px;
                                                                    height: 70px;
                                                                    object-fit: cover;
                                                                    cursor: pointer;">
                                                        </a>
                                                    </div>


                                                    <div class="text-center">
                                                        <a href="{{ asset('storage/' . $assignedtechnician->image_2) }}"
                                                            target="_blank">

                                                            <img src="{{ asset('storage/' . $assignedtechnician->image_2) }}"
                                                                alt="Work Proof Image 2" class="rounded border"
                                                                style="
                                                                    width: 90px;
                                                                    height: 70px;
                                                                    object-fit: cover;
                                                                    cursor: pointer;">
                                                        </a>
                                                    </div>
                                                </div>



                                                <form
                                                    action="{{ route('Technician.deleteWorkProof', $assignedtechnician->id) }}"method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete both work proof images? You can upload new images after deleting.')">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="bi bi-trash me-1"></i>
                                                        Delete Images
                                                    </button>
                                                </form>
                                            @else
                                                <form
                                                    action="{{ route('Technician.uploadWorkProof', $assignedtechnician->id) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="border rounded p-3 bg-light">
                                                        <div class="text-center mb-3">
                                                            <i class="bi bi-images fs-2 text-primary"></i>
                                                            <p class="small text-muted mb-0">
                                                                Upload work completion images
                                                            </p>
                                                        </div>


                                                        <div class="mb-2">
                                                            <label class="form-label small fw-bold">
                                                                Image 1
                                                            </label>
                                                            <input type="file" name="image_1"
                                                                class="form-control form-control-sm" accept="image/*"
                                                                required>
                                                        </div>


                                                        <div class="mb-3">
                                                            <label class="form-label small fw-bold">
                                                                Image 2
                                                            </label>
                                                            <input type="file" name="image_2"
                                                                class="form-control form-control-sm" accept="image/*"
                                                                required>
                                                        </div>


                                                        <button type="submit" class="btn btn-primary btn-sm w-100">
                                                            <i class="bi bi-cloud-arrow-up me-1"></i>
                                                            Upload Work Proof
                                                        </button>
                                                    </div>
                                                </form>
                                            @endif
                                        </td>


                                        <td>
                                            @if ($assignedtechnician->status === 'Completed')
                                                <span class="badge bg-success">
                                                    <i class="bi bi-check-circle me-1"></i>
                                                    Completed
                                                </span>
                                            @elseif ($assignedtechnician->status === 'Scheduled')
                                                <span class="badge bg-primary">
                                                    <i class="bi bi-clock me-1"></i>
                                                    Scheduled
                                                </span>
                                            @elseif ($assignedtechnician->status === 'Pending')
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


                                        <td>
                                            @if ($assignedtechnician->status === 'Completed')
                                                <a href="{{ route('Technician.Payment') }}"
                                                    class="btn btn-primary btn-sm px-2 py-1">
                                                    Payment
                                                </a>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty


                                    <tr>
                                        <td colspan="13" class="text-center py-5">
                                            <h5 class="mt-3 text-muted">
                                                No assigned work found.
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
