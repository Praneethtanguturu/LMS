<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Employee Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Dashboard Wrapper to prevent Breeze from overriding colors -->
            <div class="p-6">

                <h1 class="text-2xl font-bold mb-6">
                    Welcome, {{ auth()->user()->name }}
                </h1>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">

                    <div class="p-6 rounded-xl shadow !bg-blue-600">
                        <h2 class="text-lg font-semibold text-black">Total Leaves</h2>
                        <p class="text-3xl font-bold mt-2">{{ $totalLeaves }}</p>
                    </div>

                    <div class="p-6 rounded-xl shadow !bg-green-600">
                        <h2 class="text-lg font-semibold text-black">Approved</h2>
                        <p class="text-3xl font-bold mt-2">{{ $approvedLeaves }}</p>
                    </div>

                    <div class="p-6 rounded-xl shadow !bg-yellow-500">
                        <h2 class="text-lg font-semibold">Pending</h2>
                        <p class="text-3xl font-bold mt-2">{{ $pendingLeaves }}</p>
                    </div>

                    <div class="p-6 rounded-xl shadow !bg-red-600">
                        <h2 class="text-lg font-semibold">Rejected</h2>
                        <p class="text-3xl font-bold mt-2">{{ $rejectedLeaves }}</p>
                    </div>

                </div>

                <!-- Apply Leave Button -->
                <div class="mb-8 text-black">
                    <a
                        href="/apply-leave"
                        class="bg-indigo-600 text-white px-6 py-3 rounded shadow hover:bg-indigo-700 text-black">
                        Apply for Leave
                    </a>
                </div>

                <!-- Recent Leaves -->
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">Recent Leave Requests</h2>

                    <table class="w-full border">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="p-3 border">Date</th>
                                <th class="p-3 border">Leave Type</th>
                                <th class="p-3 border">Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($recentLeaves as $leave)
                            <tr>
                                <td class="p-3 border">{{ $leave->created_at->format('d M Y') }}</td>
                                <td class="p-3 border">{{ $leave->leave_type }}</td>
                                <td class="p-3 border capitalize">

                                    @if ($leave->status == 'approved')
                                        <span class="text-green-600 font-bold">Approved</span>

                                    @elseif ($leave->status == 'pending')
                                        <span class="text-yellow-600 font-bold">Pending</span>

                                    @else
                                        <span class="text-red-600 font-bold">Rejected</span>
                                    @endif

                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
