<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800">
                {{ __('Job Post / Create') }}
            </h2>

            <a href="{{ route('jobPost.index') }}"
                class="px-6 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700 transition">
                Back
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('jobPost.store') }}" method="POST">
                        @csrf

                        <div class="flex flex-col gap-4">
                            <!-- Job Title -->
                            <label class="text-sm font-semibold">Job Title</label>
                            <input type="text" name="job_title" value="{{ old('job_title') }}"
                                placeholder="Enter job title"
                                class="w-full rounded-md border-gray-300 focus:ring-slate-600 focus:border-slate-600" />
                            @error('job_title')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            <!-- Job Description -->
                            <label class="text-sm font-semibold">Job Description</label>
                            <textarea name="job_description" rows="4"
                                placeholder="Describe the job responsibilities and requirements"
                                class="w-full rounded-md border-gray-300 focus:ring-slate-600 focus:border-slate-600">{{ old('job_description') }}</textarea>
                            @error('job_description')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            <!-- Salary Range -->
                            <label class="text-sm font-semibold">Salary Range</label>
                            <input type="text" name="salary_range" value="{{ old('salary_range') }}"
                                placeholder="e.g. $4000 - $6000 per month"
                                class="w-full rounded-md border-gray-300 focus:ring-slate-600 focus:border-slate-600" />
                            @error('salary_range')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            <!-- Location -->
                            <label class="text-sm font-semibold">Location</label>
                            <input type="text" name="location" value="{{ old('location') }}"
                                placeholder="Enter job location"
                                class="w-full rounded-md border-gray-300 focus:ring-slate-600 focus:border-slate-600" />
                            @error('location')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            <!-- Job Type -->
                            <label class="text-sm font-semibold">Job Type</label>
                            <select name="job_type"
                                class="w-full rounded-md border-gray-300 focus:ring-slate-600 focus:border-slate-600">
                                <option value="" disabled {{ old('job_type') ? '' : 'selected' }}>Select job type</option>
                                <option value="full-time" {{ old('job_type') == 'full-time' ? 'selected' : '' }}>Full-time</option>
                                <option value="part-time" {{ old('job_type') == 'part-time' ? 'selected' : '' }}>Part-time</option>
                                <option value="internship" {{ old('job_type') == 'internship' ? 'selected' : '' }}>Internship</option>
                                <option value="contract" {{ old('job_type') == 'contract' ? 'selected' : '' }}>Contract</option>
                            </select>
                            @error('job_type')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            <!-- Job Level -->
                            <label class="text-sm font-semibold">Job Level</label>
                            <select name="job_level"
                                class="w-full rounded-md border-gray-300 focus:ring-slate-600 focus:border-slate-600">
                                <option value="" disabled {{ old('job_level') ? '' : 'selected' }}>Select job level</option>
                                <option value="entry" {{ old('job_level') == 'entry' ? 'selected' : '' }}>Entry</option>
                                <option value="mid" {{ old('job_level') == 'mid' ? 'selected' : '' }}>Mid</option>
                                <option value="senior" {{ old('job_level') == 'senior' ? 'selected' : '' }}>Senior</option>
                            </select>
                            @error('job_level')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            <!-- Experience -->
                            <label class="text-sm font-semibold">Experience Required (years)</label>
                            <input type="number" name="experience_required" min="0" value="{{ old('experience_required') }}"
                                placeholder="Years of experience required"
                                class="w-full rounded-md border-gray-300 focus:ring-slate-600 focus:border-slate-600" />
                            @error('experience_required')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            <!-- Education -->
                            <label class="text-sm font-semibold">Education Level</label>
                            <input type="text" name="education_level" value="{{ old('education_level') }}"
                                placeholder="e.g. Bachelor, Master, Diploma"
                                class="w-full rounded-md border-gray-300 focus:ring-slate-600 focus:border-slate-600" />
                            @error('education_level')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            <!-- Deadline -->
                            <label class="text-sm font-semibold">Application Deadline</label>
                            <input type="date" name="application_deadline" value="{{ old('application_deadline') }}"
                                class="w-full rounded-md border-gray-300 focus:ring-slate-600 focus:border-slate-600" />
                            @error('application_deadline')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            <!-- Status -->
                            <label class="inline-flex items-center mt-2">
                                <input type="checkbox" name="is_active" value="1" class="rounded text-slate-600"
                                    {{ old('is_active', true) ? 'checked' : '' }}>
                                <span class="ml-2 text-sm">Active</span>
                            </label>

                            <!-- Submit Button -->
                            <button type="submit"
                                class="inline-flex items-center justify-center px-6 py-2 text-sm font-medium text-white bg-slate-600 rounded-lg hover:bg-slate-700 transition duration-200 mt-4">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
