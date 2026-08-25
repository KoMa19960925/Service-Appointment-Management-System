@extends('layouts.Adminapp')

@section('content')
    <main class="flex-grow-1 p-4 bg-light">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold mb-1">
                        All Technician Details
                    </h2>
                </div>



                <a href="{{ route('Admin.createtechnician') }}" class="btn btn-primary">
                    <i class="bi bi-person-plus me-2"></i>
                    Add Technician
                </a>
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
                        <h5 class="fw-bold mb-1">
                        </h5>
                        <span class="badge bg-primary">
                            {{ $technicians->count() }} Technicians
                        </span>
                    </div>


                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Technician Name</th>
                                    <th>Phone</th>
                                    <th>Service Category</th>
                                    <th>Work Experience</th>
                                    <th>Email</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>


                            <tbody>
                                @forelse($technicians as $technician)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>
                                            <div class="d-flex align-items-center">
                                                <strong>
                                                    {{ $technician->name }}
                                                </strong>
                                            </div>
                                        </td>

                                        <td>
                                            {{ $technician->phone ?? '-' }}
                                        </td>

                                        <td>
                                            @if ($technician->service_category)
                                                <span class="badge bg-info text-dark">
                                                    {{ $technician->service_category }}
                                                </span>
                                            @else
                                                <span class="text-muted">
                                                    -
                                                </span>
                                            @endif
                                        </td>

                                        <td>{{ $technician->work_experience ?? '-' }}</td>
                                        <td>{{ $technician->email }}</td>


                                        <td class="text-center">
                                            <a href="{{ route('Admin.technician.edit', $technician->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil-square me-1"></i>Edit</a>


                                            <form
                                                action="{{ route('Admin.Technician.delete', ['id' => $technician->id]) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this technician?')">

                                                    <i class="bi bi-trash me-1"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-5">
                                            <h6 class="mt-3 text-muted">No technicians found.</h6>
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
