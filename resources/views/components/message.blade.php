@if(Session::has('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" {{-- 3 seconds --}} x-show="show"
        x-transition class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-sm shadow-sm">
        {{ Session::get('success') }}
    </div>
@endif

@if (Session::has('error'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" {{-- 3 seconds --}} x-show="show"
        x-transition class="mb-4 px-4 py-3 bg-red-200 text-red-800 rounded-sm shadow-sm">
        {{ Session::get('error') }}
    </div>
@endif