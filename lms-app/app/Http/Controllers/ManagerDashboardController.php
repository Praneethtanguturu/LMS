<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;

class ManagerDashboardController extends Controller
{
    public function index()
    {
        // Fetch all leave applications
        $leaves = Leave::with('user')
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('manager.dashboard', compact('leaves'));
    }

    // Approve leave
    public function approve($id)
    {
        $leave = Leave::findOrFail($id);
        $leave->status = 'approved';
        $leave->save();

        return back()->with('success', 'Leave approved successfully.');
    }

    // Reject leave
    public function reject($id)
    {
        $leave = Leave::findOrFail($id);
        $leave->status = 'rejected';
        $leave->save();

        return back()->with('success', 'Leave rejected successfully.');
    }
}
