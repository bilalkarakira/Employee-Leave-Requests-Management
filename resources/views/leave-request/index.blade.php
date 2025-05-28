@extends('layout')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Leave Requests</h1>

        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @if(auth()->user()->role === 'employee')
            <a href="{{ route('leave-request.create') }}" class="btn btn-primary mb-3">Create New Leave Request</a>
        @endif

        @if($leaveRequests->isEmpty())
            <p>No leave requests found.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Department</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th>Manager</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leaveRequests as $request)
                        <tr>
                            <td>{{ $request->employee->name ?? 'N/A' }}</td>
                            <td>{{ $request->employee->department ?? 'N/A' }}</td>
                            <td>{{ $request->start_date }}</td>
                            <td>{{ $request->end_date }}</td>
                            <td>{{ $request->reason }}</td>
                            <td>{{ ucfirst($request->status) }}</td>
                            <td>{{ $request->manager->name ?? 'Unassigned' }}</td>
                            <td>
                                <a href="{{ route('leave-request.show', $request->id) }}" class="btn btn-sm btn-info">View</a>
                                @if(auth()->user()->role === 'employee' && $request->status === 'pending')
                                    <form action="{{ route('leave-request.destroy', $request->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this leave request?');">Delete</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
