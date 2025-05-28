@extends('layout')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Leave Request Details</h1>

    <div class="card p-4 mb-4">
        <p><strong>Employee:</strong> {{ $leaveRequest->employee->name ?? 'N/A' }}</p>
        <p><strong>Department:</strong> {{ $leaveRequest->employee->department ?? 'N/A' }}</p>
        <p><strong>Start Date:</strong> {{ $leaveRequest->start_date }}</p>
        <p><strong>End Date:</strong> {{ $leaveRequest->end_date }}</p>
        <p><strong>Reason:</strong> {{ $leaveRequest->reason }}</p>
        <p><strong>Status:</strong> {{ ucfirst($leaveRequest->status) }}</p>
        <p><strong>Manager:</strong> {{ $leaveRequest->manager->name ?? 'Unassigned' }}</p>
        @if(auth()->user()->role === 'manager' && $leaveRequest->status === 'pending')
    <div>
        <form action="{{ route('leave-request.update', $leaveRequest->id) }}" method="POST" class="d-inline">
            @csrf
            @method('PUT')
            <input type="hidden" name="status" value="approved">
            <button type="submit" class="btn btn-success">Accept</button>
        </form>

        <form action="{{ route('leave-request.update', $leaveRequest->id) }}" method="POST" class="d-inline ml-2">
            @csrf
            @method('PUT')
            <input type="hidden" name="status" value="rejected">
            <button type="submit" class="btn btn-danger">Decline</button>
        </form>
    </div>
@endif
    </div>

</div>
@endsection
