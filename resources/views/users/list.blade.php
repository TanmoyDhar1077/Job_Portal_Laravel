<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800">
                {{ __('Users') }}
            </h2>

            {{-- Optional: Add user creation if needed --}}
            {{-- <a href="{{ route('users.create') }}"
                class="px-6 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700 transition">
                Create
            </a> --}}
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-4 md:mx-0">
                <div class="overflow-x-auto bg-white rounded-xl shadow-md">
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-100 text-gray-700 text-sm uppercase font-semibold">
                            <tr>
                                <th class="px-4 py-3 text-left">#</th>
                                <th class="px-4 py-3 text-left">Name</th>
                                <th class="px-4 py-3 text-left">Email</th>
                                <!-- <th class="px-4 py-3 text-left">Roles</th> -->
                                <th class="px-4 py-3 text-left">Created At</th>
                                <th class="px-4 py-3 text-left">Updated At</th>
                                <th class="px-4 py-3 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-gray-700 divide-y divide-gray-200">
                            @if($users->isNotEmpty())
                                @foreach($users as $user)
                                    <tr id="user-row-{{ $user->id }}">
                                        <td class="px-4 py-3 whitespace-nowrap">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap">{{ $user->name }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap">{{ $user->email }}</td>
                                        {{--  <td class="px-4 py-3 whitespace-nowrap">{{ $roles->$role->name }}</td> --}}
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            {{ $user->created_at->format('d-m-Y h:i A') }}
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            {{ $user->updated_at->format('d-m-Y h:i A') }}
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-center">
                                            <div class="flex justify-center space-x-2">
                                                
                                                 <a href="{{ route('users.edit', $user->id) }}"
                                                    class="px-3 py-1 text-sm font-medium text-white bg-indigo-600 rounded hover:bg-indigo-700">
                                                    Edit
                                                </a>

                                                <button onclick="deleteUser('{{ $user->id }}')"
                                                    class="px-3 py-1 text-sm font-medium text-white bg-red-600 rounded hover:bg-red-700">
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="px-4 py-3 text-center text-sm text-gray-500">No users found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="py-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function deleteUser(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This user will be deleted permanently!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/users/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    }
                })
                .then(response => {
                    if (!response.ok) throw new Error('Delete failed');
                    return response.json();
                })
                .then(data => {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'User deleted successfully',
                        showConfirmButton: false,
                        timer: 2000
                    });
                    document.getElementById(`user-row-${id}`).remove();
                })
                .catch(error => {
                    Swal.fire('Error', 'Something went wrong!', 'error');
                    console.error(error);
                });
            }
        });
    }
</script>
