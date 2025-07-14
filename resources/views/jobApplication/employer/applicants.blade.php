<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <h2 class="text-xl font-semibold text-gray-800">
                {{ __('Applicants for: ' . $job->job_title) }}
            </h2>
            <a href="{{ route('jobPost.index') }}"
                class="px-6 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700 transition">
                 Back to Jobs
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message />

           {{-- Job Details --}}
            <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6 mb-10">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Job Details</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-700">
                    <div>
                        <p><strong>Position:</strong> {{ $job->job_title }}</p>
                        <p><strong>Location:</strong> {{ $job->location }}</p>
                    </div>
                    <div>
                        <p><strong>Salary:</strong> {{ $job->salary_range }}</p>
                        <p><strong>Posted:</strong> {{ $job->created_at->format('M d, Y') }}</p>
                    </div>
                </div>
            </div>

            {{-- Applications --}}
            <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-6">
                    Applications Received ({{ $applications->count() }})
                </h3>

                @if($applications->count() > 0)
                    <div class="space-y-6">
                        @foreach($applications as $application)
                            <div class="border border-gray-100 rounded-xl bg-gray-50 p-6 hover:shadow-lg transition">

                                {{-- Applicant Info --}}
                                <h4 class="text-lg font-bold text-gray-900 mb-2">{{ $application->user->name }}</h4>
                                <p class="text-sm text-gray-700"><strong>Email:</strong> {{ $application->user->email }}</p>
                                <p class="text-sm text-gray-700"><strong>Phone:</strong> <a href="tel:{{ $application->phone }}" target="_blank" rel="noopener noreferrer">{{ $application->phone }}</a></p>
                                <p class="text-sm text-gray-700"><strong>Address:</strong> {{ $application->address }}</p>
                                <p class="text-sm text-gray-700 mb-4"><strong>Applied:</strong> {{ $application->created_at->format('M d, Y h:i A') }}</p>

                                {{-- Status Area --}}
                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 border-t border-gray-200 pt-4 mt-4">
                                    {{-- Status Pill --}}
                                    <div>
                                        <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full
                                            @if($application->status === 'shortlisted') bg-green-100 text-green-700
                                            @elseif($application->status === 'rejected') bg-red-100 text-red-700
                                            @else bg-yellow-100 text-yellow-700 @endif">
                                            Current Status: {{ ucfirst($application->status) }}
                                        </span>
                                    </div>

                                    {{-- Actions --}}
                                    <div class="flex flex-wrap gap-2">
                                        @if($application->status === 'pending')
                                            <form action="{{ route('applications.updateStatus', $application) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="shortlisted">
                                                <button type="submit"
                                                    class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm rounded-md transition">
                                                    Mark as Shortlisted
                                                </button>
                                            </form>

                                            <form action="{{ route('applications.updateStatus', $application) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="rejected">
                                                <button type="submit"
                                                    class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm rounded-md transition">
                                                    Reject
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('applications.updateStatus', $application) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="pending">
                                                <button type="submit"
                                                    class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white text-sm rounded-md transition">
                                                    Reset to Pending
                                                </button>
                                            </form>
                                        @endif

                                        {{-- View CV --}}
                                        @if($application->cv_path)
                                            <a href="{{ route('applications.cv', $application) }}" target="_blank"
                                                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded-md transition">
                                                View CV
                                            </a>
                                        @endif

                                        {{-- Email --}}
                                        <a href="mailto:{{ $application->user->email }}"
                                           class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm rounded-md transition">
                                            Contact
                                        </a>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>

                    {{-- Pagination --}}
                    @if(method_exists($applications, 'links'))
                        <div class="mt-6">
                            {{ $applications->links() }}
                        </div>
                    @endif

                @else
                    <div class="text-center py-12 text-gray-500">
                        <svg class="mx-auto h-12 w-12 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <h3 class="text-lg font-medium">No applications yet</h3>
                        <p>No candidates have applied for this position yet.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

