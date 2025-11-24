<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Apply for Leave
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-10 bg-white p-8 rounded-lg shadow">

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 mb-5 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 mb-5 rounded">
                <ul class="list-disc ml-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('leave.store') }}" method="POST">
            @csrf

            <!-- Leave Type -->
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Leave Type</label>
                <select name="leave_type" class="w-full p-2 border rounded" required>
                    <option value="">Select Leave Type</option>
                    <option value="Sick Leave" {{ old('leave_type') == 'Sick Leave' ? 'selected' : '' }}>Sick Leave</option>
                    <option value="Casual Leave" {{ old('leave_type') == 'Casual Leave' ? 'selected' : '' }}>Casual Leave</option>
                    <option value="Earned Leave" {{ old('leave_type') == 'Earned Leave' ? 'selected' : '' }}>Earned Leave</option>
                    <option value="Maternity Leave" {{ old('leave_type') == 'Maternity Leave' ? 'selected' : '' }}>Maternity Leave</option>
                </select>
            </div>

            <!-- From Date -->
            <div class="mb-4">
                <label class="block mb-1 font-semibold">From Date</label>
                <input type="date" name="from_date" class="w-full p-2 border rounded" min="{{ date('Y-m-d') }}" required>
            </div>

            <!-- To Date -->
            <div class="mb-4">
                <label class="block mb-1 font-semibold">To Date</label>
                <input type="date" name="to_date" class="w-full p-2 border rounded" min="{{ date('Y-m-d') }}" required>
            </div>

            <!-- Reason -->
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Reason</label>
                <textarea name="reason" class="w-full p-2 border rounded" rows="3" required>{{ old('reason') }}</textarea>
            </div>

            <button class="bg-indigo-600 text-black px-6 py-2 rounded hover:bg-indigo-700">
                Submit Leave Request
            </button>
        </form>
    </div>
</x-app-layout>