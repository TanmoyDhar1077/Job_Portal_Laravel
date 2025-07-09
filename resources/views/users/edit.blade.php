<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800">
                {{ __('User / Update') }}
            </h2>

            <a href="{{ route('users.index') }}"
                class="px-6 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700 transition">
                Back
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-col gap-4">
                            <!-- Name -->
                            <label class="text-xl font-semibold">Name</label>
                            <input value="{{ old('name', $user->name) }}" type="text" name="name"
                                placeholder="Type your name"
                                class="w-1/2 rounded-md ring-slate-600 focus:ring-slate-600 focus:border-slate-600" />

                            @error('name')
                                <p class="text-sm font-medium text-red-600">{{ $message }}</p>
                            @enderror
                            <!-- Email -->
                            <label class="text-xl font-semibold">Email</label>
                            <input value="{{ old('email', $user->email) }}" type="text" name="email"
                                placeholder="Type your email"
                                class="w-1/2 rounded-md ring-slate-600 focus:ring-slate-600 focus:border-slate-600" />

                            @error('email')
                                <p class="text-sm font-medium text-red-600">{{ $message }}</p>
                            @enderror
                            <!-- Roles -->
                            <div class="grid grid-cols-5 gap-2">
                                @foreach ($roles as $role)
                                    <div class="flex items-center gap-2">
                                        <input type="checkbox" name="roles[]" value="{{ $role->name }}"
                                            id="role{{ $role->id }}" {{ $hasRoles->contains($role->id) ? 'checked' : '' }}
                                            class="cursor-pointer">
                                        <label for="role{{ $role->id }}" class="cursor-pointer">
                                            {{ $role->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <button type="submit"
                            class="inline-flex items-center justify-center px-6 py-2 text-sm font-medium text-white bg-slate-600 rounded-lg hover:bg-slate-700 transition duration-200 mt-4">
                            Update User
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>