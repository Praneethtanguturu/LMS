{{-- resources/views/manager/dashboard.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manager Dashboard
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Top bar: welcome + logout --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 flex items-center justify-between">
                    <div>
                        <p class="text-lg font-semibold">
                            Welcome, {{ auth()->user()->name }} 👋
                        </p>
                        <p class="text-sm text-gray-500">
                            Role: <span class="font-medium text-gray-700">Manager</span>
                        </p>
                    </div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            type="submit"
                            class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                        >
                            Logout
                        </button>
                    </form>
                </div>
            </div>

            {{-- Pending Leave Requests --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="text-lg font-semibold">Pending Leave Requests</h3>
                            <p class="text-sm text-gray-500">
                                Review and approve/deny pending leave applications from employees.
                            </p>
                        </div>
                    </div>

                    @php
                        // Placeholder sample arrays – later you will pass $pendingLeaves from controller
                        $pendingLeaves = $pendingLeaves ?? [];
                    @endphp

                    @if(count($pendingLeaves) === 0)
                        <p class="text-sm text-gray-500">
                            No pending leave requests at the moment.
                        </p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full text-sm">
                                <thead>
                                    <tr class="border-b bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        <th class="px-4 py-2">Employee</th>
                                        <th class="px-4 py-2">Leave Type</th>
                                        <th class="px-4 py-2">From</th>
                                        <th class="px-4 py-2">To</th>
                                        <th class="px-4 py-2">Days</th>
                                        <th class="px-4 py-2">Reason</th>
                                        <th class="px-4 py-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @foreach($pendingLeaves as $leave)
                                        <tr>
                                            <td class="px-4 py-2">
                                                {{ $leave->user->name ?? 'N/A' }}
                                            </td>
                                            <td class="px-4 py-2">
                                                {{ $leave->leaveType->name ?? 'N/A' }}
                                            </td>
                                            <td class="px-4 py-2">
                                                {{ \Illuminate\Support\Carbon::parse($leave->start_date)->format('d M Y') }}
                                            </td>
                                            <td class="px-4 py-2">
                                                {{ \Illuminate\Support\Carbon::parse($leave->end_date)->format('d M Y') }}
                                            </td>
                                            <td class="px-4 py-2">
                                                {{ \Illuminate\Support\Carbon::parse($leave->start_date)->diffInDays(\Illuminate\Support\Carbon::parse($leave->end_date)) + 1 }}
                                            </td>
                                            <td class="px-4 py-2 max-w-xs">
                                                <span class="line-clamp-2">
                                                    {{ $leave->reason ?? '-' }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-2 space-x-2">
                                                {{-- Approve button --}}
                                                <form method="POST" action="{{ route('manager.leaves.update', $leave->id ?? 0) }}" class="inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="approved">
                                                    <button
                                                        type="submit"
                                                        class="px-3 py-1 text-xs font-semibold rounded-md bg-green-600 text-white hover:bg-green-700"
                                                    >
                                                        Approve
                                                    </button>
                                                </form>

                                                {{-- Reject button --}}
                                                <form method="POST" action="{{ route('manager.leaves.update', $leave->id ?? 0) }}" class="inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="rejected">
                                                    <button
                                                        type="submit"
                                                        class="px-3 py-1 text-xs font-semibold rounded-md bg-red-600 text-white hover:bg-red-700"
                                                    >
                                                        Reject
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Recent Activity / All Leaves --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Recent Leave Activity</h3>

                    @php
                        // Placeholder – later you will pass $recentLeaves from controller
                        $recentLeaves = $recentLeaves ?? [];
                    @endphp

                    @if(count($recentLeaves) === 0)
                        <p class="text-sm text-gray-500">
                            No recent leave activity.
                        </p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full text-sm">
                                <thead>
                                    <tr class="border-b bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        <th class="px-4 py-2">Employee</th>
                                        <th class="px-4 py-2">Leave Type</th>
                                        <th class="px-4 py-2">From</th>
                                        <th class="px-4 py-2">To</th>
                                        <th class="px-4 py-2">Days</th>
                                        <th class="px-4 py-2">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @foreach($recentLeaves as $leave)
                                        <tr>
                                            <td class="px-4 py-2">
                                                {{ $leave->user->name ?? 'N/A' }}
                                            </td>
                                            <td class="px-4 py-2">
                                                {{ $leave->leaveType->name ?? 'N/A' }}
                                            </td>
                                            <td class="px-4 py-2">
                                                {{ \Illuminate\Support\Carbon::parse($leave->start_date)->format('d M Y') }}
                                            </td>
                                            <td class="px-4 py-2">
                                                {{ \Illuminate\Support\Carbon::parse($leave->end_date)->format('d M Y') }}
                                            </td>
                                            <td class="px-4 py-2">
                                                {{ \Illuminate\Support\Carbon::parse($leave->start_date)->diffInDays(\Illuminate\Support\Carbon::parse($leave->end_date)) + 1 }}
                                            </td>
                                            <td class="px-4 py-2">
                                                @php
                                                    $statusColors = [
                                                        'pending'  => 'bg-yellow-100 text-yellow-800',
                                                        'approved' => 'bg-green-100 text-green-800',
                                                        'rejected' => 'bg-red-100 text-red-800',
                                                    ];
                                                    $status = $leave->status ?? 'pending';
                                                @endphp
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusColors[$status] ?? 'bg-gray-100 text-gray-800' }}">
                                                    {{ ucfirst($status) }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
