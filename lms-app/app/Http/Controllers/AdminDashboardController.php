<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Leave;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalEmployees = User::where('role', 'employee')->count();
        $totalManagers  = User::where('role', 'manager')->count();

        $totalLeaves    = Leave::count();
        $pendingLeaves  = Leave::where('status', 'pending')->count();
        $approvedLeaves = Leave::where('status', 'approved')->count();
        $rejectedLeaves = Leave::where('status', 'rejected')->count();

        return view('admin.dashboard', compact(
            'totalEmployees',
            'totalManagers',
            'totalLeaves',
            'pendingLeaves',
            'approvedLeaves',
            'rejectedLeaves'
        ));
    }
}
