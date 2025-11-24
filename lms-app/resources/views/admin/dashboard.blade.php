<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto mt-8">

        <!-- Stats Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            
            <div class="bg-indigo-600 text-black p-6 rounded-lg shadow">
                <h2 class="text-lg font-semibold">Total Employees</h2>
                <p class="text-3xl font-bold">{{ $totalEmployees }}</p>
            </div>

            <div class="bg-purple-600 text-black p-6 rounded-lg shadow">
                <h2 class="text-lg font-semibold">Total Managers</h2>
                <p class="text-3xl font-bold">{{ $totalManagers }}</p>
            </div>

            <div class="bg-blue-600 text-black p-6 rounded-lg shadow">
                <h2 class="text-lg font-semibold">Total Leave Requests</h2>
                <p class="text-3xl font-bold">{{ $totalLeaves }}</p>
            </div>
        </div>

        <!-- Leave Summary -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

            <div class="bg-yellow-500 text-black p-6 rounded-lg shadow">
                <h2 class="text-lg font-semibold">Pending Leaves</h2>
                <p class="text-3xl font-bold">{{ $pendingLeaves }}</p>
            </div>

            <div class="bg-green-500 text-black p-6 rounded-lg shadow">
                <h2 class="text-lg font-semibold">Approved Leaves</h2>
                <p class="text-3xl font-bold">{{ $approvedLeaves }}</p>
            </div>

            <div class="bg-red-500 text-black p-6 rounded-lg shadow">
                <h2 class="text-lg font-semibold">Rejected Leaves</h2>
                <p class="text-3xl font-bold">{{ $rejectedLeaves }}</p>
            </div>

        </div>

        <!-- Quick Links -->
        <div class="bg-black p-6 rounded shadow">
            <h3 class="text-xl font-bold mb-4">Quick Actions</h3>

            <a href="{{ route('admin.users') }}"
               class="bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700 mr-4">
               Manage Users
            </a>

            <a href="{{ route('manager.dashboard') }}"
               class="bg-green-600 text-black px-4 py-2 rounded hover:bg-green-700">
               View Leave Approvals
            </a>
        </div>

    </div>
</x-app-layout>
