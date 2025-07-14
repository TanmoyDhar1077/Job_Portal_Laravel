<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800">
                {{ __('Applicants for: ' . $job->job_title) }}
            </h2>
            
            <a href="{{ route('jobPost.index') }}"
                class="px-6 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700 transition">
                Back to Jobs
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Job Details Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-2">Job Details</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
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
            </div>

            <!-- Applicants List -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold">
                            Applications Received ({{ $applications->count() }})
                        </h3>
                    </div>

                    @if($applications->count() > 0)
                        <div class="grid gap-4">
                            @foreach($applications as $application)
                                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                        <!-- Applicant Info -->
                                        <div class="md:col-span-2">
                                            <h4 class="text-lg font-semibold text-gray-900 mb-2">
                                                {{ $application->user->name }}
                                            </h4>
                                            
                                            <div class="space-y-1 text-sm text-gray-600">
                                                <p><strong>Email:</strong> {{ $application->user->email }}</p>
                                                <p><strong>Phone:</strong> {{ $application->phone }}</p>
                                                <p><strong>Address:</strong> {{ $application->address }}</p>
                                                <p><strong>Applied on:</strong> {{ $application->created_at->format('M d, Y h:i A') }}</p>
                                            </div>
                                        </div>

                                        <!-- Actions -->
                                        <div class="flex flex-col space-y-2">
                                            @if($application->cv_path)
                                                <a href="{{ route('applications.cv', $application) }}" 
                                                   target="_blank"
                                                   class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                    </svg>
                                                    View CV
                                                </a>
                                            @endif
                                            
                                            <a href="mailto:{{ $application->user->email }}" 
                                               class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 transition">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                                </svg>
                                                Contact
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination if needed -->
                        @if(method_exists($applications, 'links'))
                            <div class="mt-6">
                                {{ $applications->links() }}
                            </div>
                        @endif

                    @else
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <h3 class="mt-2 text-lg font-medium text-gray-900">No applications yet</h3>
                            <p class="mt-1 text-gray-500">No candidates have applied for this position yet.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

