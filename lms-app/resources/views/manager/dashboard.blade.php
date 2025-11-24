<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            🧑‍💼 Manager Dashboard
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-10">

        @if(session('success'))
            <div class="bg-green-50 border border-green-300 text-green-800 px-4 py-3 rounded-lg mb-6 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-200">
            <h3 class="text-xl font-bold mb-6 text-gray-800 flex items-center gap-2">
                📄 All Leave Requests
            </h3>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wide border-b">
                            <th class="p-4">Employee</th>
                            <th class="p-4">Leave Type</th>
                            <th class="p-4">From</th>
                            <th class="p-4">To</th>
                            <th class="p-4">Reason</th>
                            <th class="p-4">Status</th>
                            <th class="p-4">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($leaves as $leave)
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="p-4 font-semibold text-gray-800">{{ $leave->user->name }}</td>
                            <td class="p-4">{{ $leave->leave_type }}</td>
                            <td class="p-4">{{ $leave->from_date }}</td>
                            <td class="p-4">{{ $leave->to_date }}</td>
                            <td class="p-4 text-gray-600">{{ $leave->reason }}</td>

                            <td class="p-4">
                                @if($leave->status == 'pending')
                                    <span class="px-3 py-1 rounded-full text-yellow-700 bg-yellow-100 font-semibold">
                                        Pending
                                    </span>
                                @elseif($leave->status == 'approved')
                                    <span class="px-3 py-1 rounded-full text-green-700 bg-green-100 font-semibold">
                                        Approved
                                    </span>
                                @else
                                    <span class="px-3 py-1 rounded-full text-red-700 bg-red-100 font-semibold">
                                        Rejected
                                    </span>
                                @endif
                            </td>

                            <td class="p-4">
                                @if($leave->status == 'pending')
                                    <div class="flex gap-3">

                                        <!-- Approve Button -->
                                        <form action="{{ route('leave.approve', $leave->id) }}" method="POST">
                                            @csrf
                                            <button 
                                                class="bg-green-600 text-black px-4 py-1.5 rounded-md shadow hover:bg-green-700 transition">
                                                Approve
                                            </button>
                                        </form>

                                        <!-- Reject Button -->
                                        <form action="{{ route('leave.reject', $leave->id) }}" method="POST">
                                            @csrf
                                            <button 
                                                class="bg-red-600 text-white px-4 py-1.5 rounded-md shadow hover:bg-red-700 transition">
                                                Reject
                                            </button>
                                        </form>

                                    </div>
                                @else
                                    <span class="text-gray-500 italic">No Action</span>
                                @endif
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>
