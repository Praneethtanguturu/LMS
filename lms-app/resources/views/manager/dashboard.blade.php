<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manager Dashboard
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto mt-8">

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-lg font-bold mb-4">All Leave Requests</h3>

            <table class="w-full border">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-3 border">Employee</th>
                        <th class="p-3 border">Leave Type</th>
                        <th class="p-3 border">From</th>
                        <th class="p-3 border">To</th>
                        <th class="p-3 border">Reason</th>
                        <th class="p-3 border">Status</th>
                        <th class="p-3 border">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($leaves as $leave)
                    <tr>
                        <td class="p-3 border">{{ $leave->user->name }}</td>
                        <td class="p-3 border">{{ $leave->leave_type }}</td>
                        <td class="p-3 border">{{ $leave->from_date }}</td>
                        <td class="p-3 border">{{ $leave->to_date }}</td>
                        <td class="p-3 border">{{ $leave->reason }}</td>
                        <td class="p-3 border capitalize">

                            @if($leave->status == 'pending')
                                <span class="text-yellow-600 font-bold">Pending</span>
                            @elseif($leave->status == 'approved')
                                <span class="text-green-600 font-bold">Approved</span>
                            @else
                                <span class="text-red-600 font-bold">Rejected</span>
                            @endif

                        </td>

                        <td class="p-3 border">

                            @if($leave->status == 'pending')

                                <!-- Approve -->
                                <form action="{{ route('leave.approve', $leave->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    <button class="bg-green-600 text-black px-3 py-1 rounded hover:bg-green-700">
                                        Approve
                                    </button>
                                </form>

                                <!-- Reject -->
                                <form action="{{ route('leave.reject', $leave->id) }}" method="POST" class="inline-block ml-2">
                                    @csrf
                                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                        Reject
                                    </button>
                                </form>

                            @else
                                <span class="text-gray-500">No Action</span>
                            @endif

                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>
</x-app-layout>