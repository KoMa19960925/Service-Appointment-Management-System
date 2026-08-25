@extends('layouts.Customerapp')

@section('content')
    <main class="flex-grow-1 p-4 bg-light">
        <div class="container-fluid">

            <div class="mb-4">
                <h2 class="fw-bold">
                    My Service Requests Details
                </h2>
            </div>



            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-dark">

                                <tr>
                                    <th>#</th>
                                    <th>Service Name</th>
                                    <th>Service Description</th>
                                    <th>Request Date</th>
                                    <th>Request Time</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($servicerequests as $servicerequest)
                                    <tr>
                                        <td>{{ $servicerequest->id }}</td>
                                        <td>{{ $servicerequest->service_name }}</td>
                                        <td>{{ $servicerequest->description }}</td>
                                        <td>{{ $servicerequest->request_date }}</td>
                                        <td>{{ $servicerequest->request_time }}</td>

                                        <td class="text-center">
                                            <a href="{{ route('requests.edit', $servicerequest->id) }}"
                                                class="btn btn-sm btn-warning me-1">
                                                <i class="bi bi-pencil-square"></i>Edit</a>


                                            <form action="{{ route('requests.delete', $servicerequest->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this student?')">
                                                    <i class="bi bi-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            <span class="text-dark">
                                                No servicerequest
                                            </span>
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
