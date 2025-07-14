<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            {{ __('My Job Applications') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-message />

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="overflow-x-auto bg-white rounded-xl shadow-md">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-100 text-gray-700 text-sm uppercase font-semibold">
                        <tr>
                            <th class="px-4 py-3 text-left">#</th>
                            <th class="px-4 py-3 text-left">Job Title</th>
                            <th class="px-4 py-3 text-left">Job Category</th>
                            <th class="px-4 py-3 text-left">Company Name</th>
                            <th class="px-4 py-3 text-left">Applied On</th>
                            <th class="px-4 py-3 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-700 divide-y divide-gray-200">
                        @forelse ($applications as $application)
                            <tr>
                                <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3">{{ $application->job->job_title }}</td>
                                <td class="px-4 py-3">{{ $application->job->job_category }}</td>
                                <td class="px-4 py-3">{{ $application->job->company_name ?? 'N/A' }}</td>
                                <td class="px-4 py-3">{{ $application->created_at->format('d M Y') }}</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 rounded-full text-xs font-medium
                                            @if($application->status === 'shortlisted') bg-green-100 text-green-800
                                            @elseif($application->status === 'rejected') bg-red-100 text-red-800
                                            @else bg-yellow-100 text-yellow-800 @endif">
                                        {{ ucfirst($application->status) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-sm text-gray-500">No applications found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>