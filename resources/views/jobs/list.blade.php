<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800">
                {{ __('Job Posts') }}
            </h2>
            @can('Create Jobs')
                <a href="{{ route('jobPost.create') }}"
                    class="px-6 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700 transition">
                    Create
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message />
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center mb-6">

                <!-- Filter Section -->
                <form method="GET" action="{{ route('jobPost.index') }}" class="flex flex-wrap items-center gap-3">
                    <!-- Job Type -->
                    <div>
                        <label for="job_type" class="block text-sm font-medium text-gray-700 mb-1">Job Type</label>
                        <select name="job_type" id="job_type"
                            class="w-48 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm">
                            <option value="">All Types</option>
                            @foreach ($jobTypes as $type)
                                <option value="{{ $type }}" {{ request('job_type') == $type ? 'selected' : '' }}>
                                    {{ ucfirst($type) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Location -->
                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Location</label>
                        <select name="location" id="location"
                            class="w-48 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm">
                            <option value="">All Locations</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location }}" {{ request('location') == $location ? 'selected' : '' }}>
                                    {{ $location }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Filter Button -->
                    <div class="mt-5 md:mt-6">
                        <button type="submit" name="filter_btn"
                            class="px-4 py-2 bg-gray-700 hover:bg-gray-800 text-white rounded-md text-sm shadow-sm">
                            Filter
                        </button>
                    </div>
                </form>

                <!-- Search Section -->
                <form method="GET" action="{{ route('jobPost.index') }}"
                    class="flex items-end justify-end gap-3 mt-4 md:mt-0">
                    <div class="w-full md:w-auto">
                        <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                        <input type="text" name="search" id="search" value="{{ request('search') }}"
                            placeholder="Search jobs..."
                            class="w-full md:w-64 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm">
                    </div>

                    <div>
                        <button type="submit" name="search_btn"
                            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-sm shadow-sm">
                            Search
                        </button>
                    </div>
                </form>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-4 md:mx-0">
                <div class="overflow-x-auto bg-white rounded-xl shadow-md">
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-100 text-gray-700 text-sm uppercase font-semibold">
                            <tr>
                                <th class="px-4 py-3 text-left">#</th>
                                <th class="px-4 py-3 text-left">Title</th>
                                <th class="px-4 py-3 text-left">Location</th>
                                <th class="px-4 py-3 text-left">Type</th>
                                <th class="px-4 py-3 text-left">Deadline</th>
                                <th class="px-4 py-3 text-left">Status</th>
                                <th class="px-4 py-3 text-left">Created At</th>
                                <th class="px-4 py-3 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-gray-700 divide-y divide-gray-200">
                            @forelse($jobs as $job)
                                <tr id="job-row-{{ $job->id }}">
                                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-3">{{ $job->job_title }}</td>
                                    <td class="px-4 py-3">{{ $job->location }}</td>
                                    <td class="px-4 py-3 capitalize">{{ $job->job_type }}</td>
                                    <td class="px-4 py-3">{{ $job->application_deadline ?? 'N/A' }}</td>
                                    <td class="px-4 py-3">
                                        <span
                                            class="px-2 py-1 rounded text-xs {{ $job->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $job->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3">{{ $job->created_at->format('d-m-Y') }}</td>
                                    <td class="px-4 py-3 text-center">
                                        <div class="flex justify-center space-x-2">
                                            <!-- View -->
                                            @can('Job Details View')
                                                <a href="{{ route('jobPost.show', $job->id) }}"
                                                    class="px-3 py-1 text-sm font-medium text-white bg-blue-600 rounded hover:bg-blue-700">
                                                    View
                                                </a>
                                            @endcan

                                            <!-- Edit -->
                                            @can('Edit Jobs')
                                                <a href="{{ route('jobPost.edit', $job->id) }}"
                                                    class="px-3 py-1 text-sm font-medium text-white bg-indigo-600 rounded hover:bg-indigo-700">
                                                    Edit
                                                </a>
                                            @endcan

                                            <!-- Delete -->
                                            @can('Delete Jobs')
                                                <button onclick="deleteJob('{{ $job->id }}')"
                                                    class="px-3 py-1 text-sm font-medium text-white bg-red-600 rounded hover:bg-red-700">
                                                    Delete
                                                </button>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4 text-sm text-gray-500">No job posts found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="py-4">
                {{ $jobs->links() }}
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function deleteJob(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This job post will be deleted permanently!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/jobs/${id}`, {
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
                            title: 'Job post deleted successfully',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        document.getElementById(`job-row-${id}`).remove();
                    })
                    .catch(error => {
                        Swal.fire('Error', 'Something went wrong!', 'error');
                        console.log(error)
                    });
            }
        });
    }
</script>