<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800">
                {{ __('Permissions / Create') }}
            </h2>

            <a href="{{ route('permission.index') }}"
                class="px-6 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700 transition">
                Back
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- {{ __("You're logged in!") }} -->
                    <form action="{{ route('permission.store') }}" method="post">
                        @csrf
                        <div class="flex flex-col gap-4">
                            <label class="text-xl font-semibold">Name</label>
                            <input value="{{ old('name') }}" type="text" name="name" placeholder="Type here"
                                class="w-1/2 rounded-md ring-slate-600 focus:ring-slate-600 focus:border-slate-600" />

                            @error('name')
                                <p class="text-sm font-medium text-red-600">{{ $message }}</p>
                            @enderror

                        </div>
                        <button type="submit"
                            class="inline-flex items-center justify-center px-6 py-2 text-sm font-medium text-white bg-slate-600 rounded-lg hover:bg-slate-700 transition duration-200 mt-4">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>