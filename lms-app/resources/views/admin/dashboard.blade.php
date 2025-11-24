<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-900 leading-tight">
            🌈 Admin Dashboard
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-10 space-y-10">

        <!-- STAT CARDS -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Total Employees -->
            <div class="p-6 rounded-2xl shadow-xl bg-gradient-to-r from-indigo-500 to-purple-500 text-black transform hover:scale-105 transition duration-300">
                <h2 class="text-black font-semibold opacity-90">Total Employees</h2>
                <p class="text-4xl font-extrabold mt-2">{{ $totalEmployees }}</p>
            </div>

            <!-- Total Managers -->
            <div class="p-6 rounded-2xl shadow-xl bg-gradient-to-r from-pink-500 to-rose-500 text-black transform hover:scale-105 transition duration-300">
                <h2 class="text-black font-semibold opacity-90">Total Managers</h2>
                <p class="text-4xl font-extrabold mt-2">{{ $totalManagers }}</p>
            </div>

            <!-- Total Leave Requests -->
            <div class="p-6 rounded-2xl shadow-xl bg-gradient-to-r from-blue-500 to-cyan-500 text-black transform hover:scale-105 transition duration-300">
                <h2 class="text-black font-semibold opacity-90">Total Leave Requests</h2>
                <p class="text-4xl font-extrabold mt-2">{{ $totalLeaves }}</p>
            </div>

        </div>


        <!-- LEAVE STATUS SUMMARY -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <div class="p-6 rounded-2xl shadow-xl bg-gradient-to-r from-yellow-400 to-amber-500 text-black transform hover:scale-105 transition duration-300">
                <h2 class="text-black font-semibold opacity-90">Pending Leaves</h2>
                <p class="text-4xl font-extrabold mt-2">{{ $pendingLeaves }}</p>
            </div>

            <div class="p-6 rounded-2xl shadow-xl bg-gradient-to-r from-green-500 to-emerald-500 text-black transform hover:scale-105 transition duration-300">
                <h2 class="text-black font-semibold opacity-90">Approved Leaves</h2>
                <p class="text-4xl font-extrabold mt-2">{{ $approvedLeaves }}</p>
            </div>

            <div class="p-6 rounded-2xl shadow-xl bg-gradient-to-r from-red-500 to-rose-600 text-black transform hover:scale-105 transition duration-300">
                <h2 class="text-black font-semibold opacity-90">Rejected Leaves</h2>
                <p class="text-4xl font-extrabold mt-2">{{ $rejectedLeaves }}</p>
            </div>

        </div>


        <!-- QUICK ACTIONS -->
        <div class="p-8 bg-black shadow-2xl rounded-2xl border border-gray-200">

            <h3 class="text-2xl font-bold mb-6 text-gray-800">⚡ Quick Actions</h3>

            <div class="flex flex-wrap gap-4">

                <a href="{{ route('admin.users') }}"
                   class="px-6 py-3 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 text-black font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition">
                    👥 Manage Users
                </a>

                <a href="{{ route('manager.dashboard') }}"
                   class="px-6 py-3 rounded-xl bg-gradient-to-r from-green-500 to-emerald-600 text-black font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition">
                    📄 View Leave Approvals
                </a>

            </div>

        </div>

    </div>

</x-app-layout>
