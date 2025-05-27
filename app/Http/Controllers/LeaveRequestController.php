<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    public function index()
    {
        return view('leave-request.index');
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

        // $formFields['user_id'] = auth()->id();

        LeaveRequest::create($formFields);

        return redirect('/')->with('message', 'Leave Request Created successfully');
    }
}
