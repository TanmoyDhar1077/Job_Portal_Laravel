<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Apply to {{ $job->job_title }}</h2>
    </x-slot>

    <div class="py-6 max-w-xl mx-auto">
        <x-message />
        
        <form action="{{ route('jobs.apply.store', $job->id) }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded shadow">
            @csrf

            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700">Full Name</label>
                <input type="text" class="w-full border-gray-300 rounded" value="{{ auth()->user()->name }}" disabled>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700">Email</label>
                <input type="email" class="w-full border-gray-300 rounded" value="{{ auth()->user()->email }}" disabled>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700">Phone</label>
                <input type="text" placeholder="Enter your phone number" name="phone" class="w-full border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700">Address</label>
                <input type="text" placeholder="Enter your address" name="address" class="w-full border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700">Upload CV</label>
                <input type="file" name="cv" class="w-full border-gray-300 rounded" required>
            </div>

            <button type="submit" class="bg-slate-600 text-white px-4 py-2 rounded hover:bg-slate-700">
                Submit Application
            </button>
        </form>
    </div>
</x-app-layout>