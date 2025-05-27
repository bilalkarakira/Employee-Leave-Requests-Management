<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;

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
        $formFields = $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'reason' => 'required',
        ]);

        $formFields['user_id'] = auth()->user()->id;

        LeaveRequest::create($formFields);

        return redirect('/')->with('message', 'Leave Request Created successfully');
    }
}
