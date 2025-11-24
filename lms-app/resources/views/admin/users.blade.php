<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage Users
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-8">

        @if(session('success'))
            <div class="bg-green-100 p-3 mb-4 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow p-6 rounded">
            <table class="w-full border">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="p-3 border">Name</th>
                        <th class="p-3 border">Email</th>
                        <th class="p-3 border">Role</th>
                        <th class="p-3 border">Change Role</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="p-3 border">{{ $user->name }}</td>
                            <td class="p-3 border">{{ $user->email }}</td>
                            <td class="p-3 border capitalize">{{ $user->role }}</td>

                            <td class="p-3 border">
                                <form method="POST" action="{{ route('admin.updateRole', $user->id) }}">
                                    @csrf
                                    <select name="role" class="border px-2 py-1 rounded">
                                        <option value="employee" @selected($user->role=='employee')>Employee</option>
                                        <option value="manager" @selected($user->role=='manager')>Manager</option>
                                        <option value="admin" @selected($user->role=='admin')>Admin</option>
                                    </select>

                                    <button class="bg-blue-600 text-black px-3 py-1 rounded ml-2 hover:bg-blue-700">
                                        Update
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
