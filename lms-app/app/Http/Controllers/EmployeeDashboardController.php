<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;

class EmployeeDashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;

        // Stats
        $totalLeaves = Leave::where('user_id', $userId)->count();
        $approvedLeaves = Leave::where('user_id', $userId)->where('status', 'approved')->count();
        $pendingLeaves = Leave::where('user_id', $userId)->where('status', 'pending')->count();
        $rejectedLeaves = Leave::where('user_id', $userId)->where('status', 'rejected')->count();

        // Recent leave history
        $recentLeaves = Leave::where('user_id', $userId)
                             ->orderBy('created_at', 'desc')
                             ->take(5)
                             ->get();

        return view('employee.dashboard', compact(
            'totalLeaves',
            'approvedLeaves',
            'pendingLeaves',
            'rejectedLeaves',
            'recentLeaves'
        ));
    }
}