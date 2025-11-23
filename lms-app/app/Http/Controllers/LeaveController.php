<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    // Show apply leave form
    public function create()
    {
        return view('employee.apply-leave');
    }

    // Store leave request
    public function store(Request $request)
    {
        $request->validate([
            'leave_type' => 'required',
            'from_date' => 'required|date|after_or_equal:today',
            'to_date' => 'required|date|after_or_equal:from_date',
            'reason' => 'required|min:5',
        ]);

        Leave::create([
            'user_id' => auth()->id(),
            'leave_type' => $request->leave_type,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'reason' => $request->reason,
            'status' => 'pending',
        ]);

        return redirect()->route('employee.dashboard')->with('success', 'Leave applied successfully!');
    }
}
