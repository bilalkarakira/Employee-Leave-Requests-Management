@extends('layout')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Leave Request Details</h1>

    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="card p-4 mb-4">
        <p><strong>Employee:</strong> {{ $leaveRequest->employee->name ?? 'N/A' }}</p>
        <p><strong>Start Date:</strong> {{ $leaveRequest->start_date }}</p>
        <p><strong>End Date:</strong> {{ $leaveRequest->end_date }}</p>
        <p><strong>Reason:</strong> {{ $leaveRequest->reason }}</p>
        <p><strong>Status:</strong> {{ ucfirst($leaveRequest->status) }}</p>
        <p><strong>Manager:</strong> {{ $leaveRequest->manager->name ?? 'Unassigned' }}</p>
    </div>

    @if(auth()->user()->role === 'Manager')
        <form method="POST" action="{{ route('leave-request.update', $leaveRequest->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="status"><strong>Update Status</strong></label>
                <select name="status" id="status" class="form-control">
                    <option value="pending" {{ $leaveRequest->status === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ $leaveRequest->status === 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="declined" {{ $leaveRequest->status === 'declined' ? 'selected' : '' }}>Declined</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="manager_id"><strong>Assign Manager</strong></label>
                <select name="manager_id" id="manager_id" class="form-control">
                    <option value="">-- Select Manager --</option>
                    @foreach($managers as $manager)
                        <option value="{{ $manager->id }}" {{ $leaveRequest->manager_id == $manager->id ? 'selected' : '' }}>
                            {{ $manager->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Update Request</button>
        </form>
    @endif
</div>
@endsection
