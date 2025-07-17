<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800">
                {{ __('Job Post Details') }}
            </h2>

            <a href="{{ route('jobPost.index') }}"
                class="px-6 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700 transition">
                Back to List
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <x-message />
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm text-gray-800">

                    <div>
                        <span class="font-semibold">Job Title:</span>
                        <div>{{ $job->job_title }}</div>
                    </div>

                    <div>
                        <span class="font-semibold">Job Category:</span>
                        <div>{{ $job->job_category }}</div>
                    </div>

                    <div>
                        <span class="font-semibold">Company Name:</span>
                        <div>{{ $job->company_name }}</div>
                    </div>

                    <div>
                        <span class="font-semibold">Location:</span>
                        <div>{{ $job->location }}</div>
                    </div>

                    <div>
                        <span class="font-semibold">Job Type:</span>
                        <div class="capitalize">{{ $job->job_type }}</div>
                    </div>

                    <div>
                        <span class="font-semibold">Job Level:</span>
                        <div class="capitalize">{{ $job->job_level ?? 'N/A' }}</div>
                    </div>

                    <div>
                        <span class="font-semibold">Salary Range:</span>
                        <div>{{ $job->salary_range ?? 'N/A' }}</div>
                    </div>

                    <div>
                        <span class="font-semibold">Experience Required:</span>
                        <div>{{ $job->experience_required ? $job->experience_required . ' year(s)' : 'Not specified' }}
                        </div>
                    </div>

                    <div>
                        <span class="font-semibold">Education Level:</span>
                        <div>{{ $job->education_level ?? 'N/A' }}</div>
                    </div>

                    <div>
                        <span class="font-semibold">Application Deadline:</span>
                        <div>{{ $job->application_deadline ?? 'Not set' }}</div>
                    </div>

                    <div>
                        <span class="font-semibold">Status:</span>
                        <div>
                            <span
                                class="px-2 py-1 rounded text-xs {{ $job->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $job->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                    </div>

                    <div>
                        <span class="font-semibold">Posted At:</span>
                        <div>{{ $job->created_at->format('d-m-Y h:i A') }}</div>
                    </div>

                    {{-- @if(auth()->user()->hasRole('Employer') && $job->user_id == auth()->id()) --}}
                    @can('Viewers Seen')
                    <div>
                        <span class="font-semibold">Views:</span>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 text-blue-500 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-blue-600 font-medium">{{ $job->views ?? 0 }}</span>
                        </div>
                    </div>
                    @endcan
                    {{-- @endif --}}

                </div>

                <div class="mt-6">
                    <span class="font-semibold block mb-2">Job Description:</span>
                    <div class="p-4 rounded-md text-gray-700 text-sm">
                        {!! nl2br(e($job->job_description)) ?? 'No description provided.' !!}
                    </div>
                </div>
                @can('Apply Job')


                    @if ($alreadyApplied)
                        <div class="mt-6">
                            <button class="px-4 py-2 bg-green-400 text-white rounded-lg cursor-not-allowed" disabled>
                                Already Applied
                            </button>
                        </div>
                    @else
                        <div class="mt-6">
                            <a href="{{ route('jobs.apply', $job->id) }}"
                                class="px-4 py-2 bg-slate-600 hover:bg-slate-700 text-white rounded-lg">
                                Apply Now
                            </a>
                        </div>
                    @endif
                @endcan
            </div>
        </div>
    </div>
</x-app-layout>