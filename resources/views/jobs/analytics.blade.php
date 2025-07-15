<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800">
                {{ __('Job Analytics') }} - {{ $job->job_title }}
            </h2>
            <a href="{{ route('jobPost.index') }}"
                class="px-6 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700 transition">
                Back to List
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message />

            <!-- Job Info Summary -->
            <div class="bg-white shadow-sm sm:rounded-lg p-6 mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Job Overview</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm text-gray-700">
                    <div>
                        <span class="font-semibold">Job Title:</span>
                        <div>{{ $job->job_title }}</div>
                    </div>
                    <div>
                        <span class="font-semibold">Location:</span>
                        <div>{{ $job->location }}</div>
                    </div>
                    <div>
                        <span class="font-semibold">Posted:</span>
                        <div>{{ $job->created_at->format('d-m-Y') }}</div>
                    </div>
                </div>
            </div>

            <!-- View Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                <!-- Total Views -->
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="text-lg font-semibold">Total Views</h4>
                            <p class="text-3xl font-bold mt-2">{{ $viewStats['total_views'] }}</p>
                        </div>
                        <div class="text-blue-100">
                            <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Unique Users -->
                <div class="bg-gradient-to-r from-green-500 to-green-600 text-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="text-lg font-semibold">Unique Users</h4>
                            <p class="text-3xl font-bold mt-2">{{ $viewStats['unique_users'] }}</p>
                        </div>
                        <div class="text-green-100">
                            <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Views Today -->
                <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="text-lg font-semibold">Views Today</h4>
                            <p class="text-3xl font-bold mt-2">{{ $viewStats['views_today'] }}</p>
                        </div>
                        <div class="text-purple-100">
                            <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h4 class="text-lg font-semibold text-gray-700 mb-2">This Week</h4>
                    <p class="text-2xl font-bold text-indigo-600">{{ $viewStats['views_this_week'] }}</p>
                    <p class="text-sm text-gray-500">views</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h4 class="text-lg font-semibold text-gray-700 mb-2">This Month</h4>
                    <p class="text-2xl font-bold text-indigo-600">{{ $viewStats['views_this_month'] }}</p>
                    <p class="text-sm text-gray-500">views</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h4 class="text-lg font-semibold text-gray-700 mb-2">Anonymous Views</h4>
                    <p class="text-2xl font-bold text-indigo-600">{{ $viewStats['anonymous_views'] }}</p>
                    <p class="text-sm text-gray-500">views</p>
                </div>
            </div>

            <!-- Daily Views Chart (Simple Table Version) -->
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Daily Views (Last 30 Days)</h3>
                @if($dailyViews->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Date</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Views</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Visual</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($dailyViews as $dayView)
                                    <tr>
                                        <td class="px-4 py-2 text-sm text-gray-700">
                                            {{ \Carbon\Carbon::parse($dayView->date)->format('M d, Y') }}
                                        </td>
                                        <td class="px-4 py-2 text-sm font-medium text-gray-900">
                                            {{ $dayView->views }}
                                        </td>
                                        <td class="px-4 py-2">
                                            <div class="flex items-center">
                                                @php
                                                    $maxViews = $dailyViews->max('views');
                                                    $width = $maxViews > 0 ? ($dayView->views / $maxViews) * 200 : 4;
                                                @endphp
                                                <div class="bg-blue-500 h-4 rounded" 
                                                     style="width: {{ $width }}px; min-width: 4px;">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-8 text-gray-500">
                        <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <p class="text-lg font-medium">No view data available yet</p>
                        <p class="text-sm">Views will appear here once candidates start viewing your job post.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
