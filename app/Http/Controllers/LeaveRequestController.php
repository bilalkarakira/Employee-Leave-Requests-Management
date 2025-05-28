<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeaveRequestController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        // dd($user->role);
        if ($user->role === 'employee') {
            // Return only their own leave requests
            $leaveRequests = LeaveRequest::where('user_id', $user->id)->get();
        } else {
            // If manager, return all leave requests
            $leaveRequests = LeaveRequest::all();
        }
        return view('leave-request.index', ['leaveRequests' => $leaveRequests]);
    }

    public function show(LeaveRequest $leaveRequest)
    {
        return view('leave-request.show', [
            'leaveRequest' => $leaveRequest
        ]);
    }

    public function create()
    {
        return view('leave-request.create');
    }

    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'reason' => 'required|string',
    ]);

    $validator->after(function ($validator) use ($request) {
        if ($request->end_date < $request->start_date) {
            $validator->errors()->add('end_date', 'End date cannot be before start date.');
        }
    });

    if ($validator->fails()) {
        return back()
            ->withErrors($validator)
            ->withInput();
    }

    LeaveRequest::create([
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'reason' => $request->reason,
        'user_id' => auth()->id(),
    ]);

    return redirect('/leave-requests')->with('message', 'Leave Request created successfully.');
}

    public function update(Request $request, LeaveRequest $leaveRequest)
    {
        $user = auth()->user();
        if($user->role !== 'manager'){
            abort(403, 'Unauthorized Service');
        }

        $formFields = $request->validate([
            'status' => 'required'
        ]);

        $formFields['manager_id'] = $user->id;

        $leaveRequest->update($formFields);

        return redirect('/leave-requests')->with('message', 'Leave Request Updated successfully');
    }

    public function destroy(LeaveRequest $leaveRequest)
    {
        $leaveRequest->delete();

        return redirect('/leave-requests')->with('message', 'Leave Request deleted successfully');
    }
}
