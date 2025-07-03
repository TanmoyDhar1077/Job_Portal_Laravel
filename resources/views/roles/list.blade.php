<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800">
                {{ __('Roles') }}
            </h2>

            <a href="{{ route('roles.create') }}"
                class="px-6 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700 transition">
                Create
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-4 md:mx-0">
                <div class="overflow-x-auto bg-white rounded-xl shadow-md">
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-100 text-gray-700 text-sm uppercase font-semibold">
                            <tr>
                                <th class="px-4 py-3 text-left">#</th>
                                <th class="px-4 py-3 text-left">Name</th>
                                <th class="px-4 py-3 text-left">Created At</th>
                                <th class="px-4 py-3 text-center">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="text-sm text-gray-700 divide-y divide-gray-200">
                            @if($roles->isNotEmpty())
                                @foreach($roles as $role)
                                    <tr>
                                        <td class="px-4 py-3 whitespace-nowrap">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap">{{ $role->name }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            {{ $role->created_at->format('d-m-Y h:i A') }}
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-center">
                                            <div class="flex justify-center space-x-2">
                                                <a href="#"
                                                    class="px-3 py-1 text-sm font-medium text-white bg-indigo-600 rounded hover:bg-indigo-700">
                                                    Edit
                                                </a>
                                                <button 
                                                    class="px-3 py-1 text-sm font-medium text-white bg-red-600 rounded hover:bg-red-700">
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="px-4 py-3 text-center text-sm text-gray-500">No permissions
                                        found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <!--  Pagination -->
            <div class="py-4">
                {{ $roles->links() }}
            </div>
        </div>
    </div>
</x-app-layout>

<!-- <script>
    function deletePermission(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This role will be deleted permanently!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/permissions/${id}`, {
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
                        title: 'Permission deleted successfully',
                        showConfirmButton: false,
                        timer: 2000
                    });
                    document.getElementById(`role-row-${id}`).remove();
                })
                .catch(error => {
                    Swal.fire('Error', 'Something went wrong!', 'error');
                });
            }
        });
    }
</script> -->