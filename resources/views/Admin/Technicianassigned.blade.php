@extends('layouts.Adminapp')

@section('content')

    <main class="flex-grow-1 p-4 bg-light">
        <div class="container-fluid">
            <div class="mb-4">
                <h2 class="fw-bold">Technician Assigned</h2>
            </div>


            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert">
                    </button>
                </div>
            @endif


            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert">
                    </button>
                </div>
            @endif


            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Please fix the following errors:</strong>

                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


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
                                    <th>Customer Request Date</th>
                                    <th>Customer Request Time</th>
                                    <th>Technician</th>
                                    <th>Assignment Date</th>
                                    <th>Assignment Time</th>
                                    <th>Work Proof</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($servicerequests as $servicerequest)
                                    @php
                                        $assignment = $servicerequest->assignedTechnician;
                                        $imagesUploaded =
                                            $assignment && !empty($assignment->image_1) && !empty($assignment->image_2);
                                    @endphp

                                    <tr>
                                        <td>
                                            <strong>{{ $servicerequest->id }}</strong>
                                        </td>

                                        <td>
                                            <strong>{{ $servicerequest->name }}</strong>
                                        </td>

                                        <td style="min-width: 180px;">
                                            {{ $servicerequest->service_name }}
                                        </td>

                                        <td style="min-width: 220px;">
                                            {{ $servicerequest->description }}
                                        </td>

                                        <td>

                                            @if ($servicerequest->request_date)
                                                <span class="badge bg-secondary">

                                                    <i class="bi bi-calendar me-1"></i>

                                                    {{ $servicerequest->request_date }}

                                                </span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif

                                        </td>



                                        <td>
                                            @if ($servicerequest->request_time)
                                                <span class="badge bg-secondary">

                                                    <i class="bi bi-clock me-1"></i>

                                                    {{ $servicerequest->request_time }}

                                                </span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif

                                        </td>



                                        <td style="min-width: 230px;">
                                            @if ($assignment)
                                                <div class="d-flex align-items-center mb-2">
                                                    <i class="bi bi-person-check-fill text-success fs-4 me-2"></i>
                                                    <div>
                                                        <strong>
                                                            {{ $assignment->technician->name }}
                                                        </strong>
                                                    </div>
                                                </div>


                                                @if ($assignment->status !== 'Completed')
                                                    <form
                                                        action="{{ route('Admin.removeTechnician', $assignment->id) }}"method="POST"
                                                        onsubmit="return confirm('Are you sure you want to remove this technician? You can assign another technician after removing.');">

                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                                                            <i class="bi bi-person-x me-1"></i>Change Technician
                                                        </button>
                                                    </form>
                                                @endif
                                            @else
                                                <form action="{{ route('Admin.assignTechnician', $servicerequest->id) }}"
                                                    method="POST">

                                                    @csrf
                                                    <label class="small fw-semibold mb-1">Select Technician</label>
                                                    <select name="technician_id" class="form-select form-select-sm mb-2">
                                                        <option value="">Select Technician</option>

                                                        @foreach ($technicians as $technician)
                                                            <option value="{{ $technician->id }}">
                                                                {{ $technician->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>


                                                    <label class="small fw-semibold mb-1">Assignment Date</label>
                                                    <input type="date" name="assigned_date"
                                                        class="form-control form-control-sm mb-2" min="{{ date('Y-m-d') }}"
                                                        required>

                                                    <label class="small fw-semibold mb-1">Assignment Time</label>
                                                    <input type="time" name="assigned_time"
                                                        class="form-control form-control-sm mb-2" required>
                                                    <button type="submit" class="btn btn-primary btn-sm w-100">
                                                        <i class="bi bi-person-check me-1"></i>
                                                        Assign Technician
                                                    </button>
                                                </form>
                                            @endif
                                        </td>

                                        <td>
                                            @if ($assignment)
                                                <span class="badge bg-primary">
                                                    <i class="bi bi-calendar-check me-1"></i>
                                                    {{ $assignment->assigned_date }}
                                                </span>
                                            @else
                                                <span class="text-muted">
                                                    Not Assigned
                                                </span>
                                            @endif
                                        </td>


                                        <td>
                                            @if ($assignment)
                                                <span class="badge bg-primary">
                                                    <i class="bi bi-clock me-1"></i>
                                                    {{ $assignment->assigned_time }}
                                                </span>
                                            @else
                                                <span class="text-muted">
                                                    Not Assigned
                                                </span>
                                            @endif
                                        </td>


                                        <td style="min-width: 220px;">
                                            @if ($assignment)
                                                @if ($imagesUploaded)
                                                    <div class="d-flex gap-2 flex-wrap">
                                                        <a href="{{ asset('storage/' . $assignment->image_1) }}"
                                                            target="_blank" class="btn btn-sm btn-warning">
                                                            <i class="bi bi-image me-1"></i>Image 1
                                                        </a>


                                                        <a href="{{ asset('storage/' . $assignment->image_2) }}"
                                                            target="_blank" class="btn btn-sm btn-warning">
                                                            <i class="bi bi-image me-1"></i>Image 2
                                                        </a>

                                                    </div>
                                                    <small class="text-success d-block mt-2">
                                                        Completed work images uploaded
                                                    </small>
                                                @else
                                                    <div class="border rounded p-3 text-center bg-light">

                                                        <i class="bi bi-images fs-3 text-muted"></i>

                                                        <div class="small text-muted mt-1">
                                                            Completed work images
                                                        </div>

                                                    </div>
                                                @endif
                                            @else
                                                <span class="text-muted">
                                                    Not Assigned
                                                </span>
                                            @endif

                                        </td>



                                        <td style="min-width: 190px;">
                                            @if ($assignment)
                                                @if ($assignment->status === 'Completed')
                                                    <span class="badge bg-success">
                                                        <i class="bi bi-check-circle me-1"></i>
                                                        Completed
                                                    </span>
                                                @elseif($assignment->status === 'Scheduled')
                                                    <span class="badge bg-primary">
                                                        <i class="bi bi-clock me-1"></i>Scheduled
                                                    </span>
                                                @elseif($assignment->status === 'Pending')
                                                    <span class="badge bg-warning text-dark">
                                                        <i class="bi bi-hourglass-split me-1"></i>Pending
                                                    </span>
                                                @else
                                                    <span class="badge bg-secondary">
                                                        {{ $assignment->status }}
                                                    </span>
                                                @endif
                                            @else
                                                <span class="badge bg-warning text-dark">
                                                    <i class="bi bi-hourglass-split me-1"></i>Pending
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty


                                    <tr>
                                        <td colspan="11" class="text-center py-5">
                                            <i class="bi bi-clipboard-x fs-1 text-muted"></i>
                                            <h5 class="text-muted mt-3">No customer service requests found</h5>
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
