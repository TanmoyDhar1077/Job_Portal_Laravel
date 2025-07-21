<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} 
            @if($canViewCharts)
                - Admin Analytics
            @else
                - Overview
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Access Level Notice -->
            @if(!$canViewCharts)
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-blue-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <p class="text-blue-800 font-medium">Basic Dashboard Access</p>
                            <p class="text-blue-600 text-sm">You can see: Total Jobs, Active Jobs, Employers, and New Jobs This Week. For full analytics and charts, request "Dashboard View" permission from your administrator.</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Jobs (Available to all users) -->
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-blue-100 text-sm">Total Jobs</p>
                            <p class="text-3xl font-bold">{{ $totalJobs }}</p>
                        </div>
                        <div class="text-blue-200">
                            <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Active Jobs (Available to all users) -->
                <div class="bg-gradient-to-r from-green-500 to-green-600 text-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-green-100 text-sm">Active Jobs</p>
                            <p class="text-3xl font-bold">{{ $activeJobs }}</p>
                        </div>
                        <div class="text-green-200">
                            <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Total Employers (Available to all users) -->
                <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-purple-100 text-sm">Employers</p>
                            <p class="text-3xl font-bold">{{ $totalEmployers }}</p>
                        </div>
                        <div class="text-purple-200">
                            <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- New Jobs This Week (Available to all users) -->
                <div class="bg-gradient-to-r from-indigo-500 to-indigo-600 text-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-indigo-100 text-sm">New Jobs This Week</p>
                            <p class="text-3xl font-bold">{{ $recentJobs }}</p>
                        </div>
                        <div class="text-indigo-200">
                            <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Total Applications (Only for users with chart access) -->
                @if($canViewCharts)
                    <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white p-6 rounded-lg shadow-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-orange-100 text-sm">Applications</p>
                                <p class="text-3xl font-bold">{{ $totalApplications }}</p>
                            </div>
                            <div class="text-orange-200">
                                <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Charts Section (Only for Super Admin or Dashboard View permission) -->
            @if($canViewCharts)
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                    
                    <!-- Job Posts by Category Chart -->
                    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-800 mb-4">Job Posts by Category</h3>
                            <div id="job-category-chart" style="height: 400px;"></div>
                        </div>
                    </div>

                    <!-- Job Type Distribution Chart -->
                    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-800 mb-4">Job Type Distribution</h3>
                            <div id="job-type-chart" style="height: 400px;"></div>
                        </div>
                    </div>

                </div>
            @else
                <!-- Message for users without chart access -->
                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg mb-8">
                    <div class="p-8 text-center">
                        <div class="text-gray-400 mb-4">
                            <svg class="w-16 h-16 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Analytics Charts Restricted</h3>
                        <p class="text-gray-500 mb-4">You need "Dashboard View" permission to access detailed analytics and charts.</p>
                        <p class="text-sm text-gray-400">Contact your system administrator to request access.</p>
                    </div>
                </div>
            @endif

            <!-- Additional Statistics -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                <!-- Recent Activity -->
                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Recent Activity</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-blue-50 rounded-lg">
                                <div>
                                    <p class="font-semibold text-blue-800">New Jobs This Week</p>
                                    <p class="text-blue-600">Jobs posted in the last 7 days</p>
                                </div>
                                <div class="text-2xl font-bold text-blue-700">{{ $recentJobs }}</div>
                            </div>
                            @if($canViewCharts)
                                <div class="flex items-center justify-between p-4 bg-green-50 rounded-lg">
                                    <div>
                                        <p class="font-semibold text-green-800">Total Candidates</p>
                                        <p class="text-green-600">Registered job seekers</p>
                                    </div>
                                    <div class="text-2xl font-bold text-green-700">{{ $totalCandidates }}</div>
                                </div>
                            @else
                                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                    <div>
                                        <p class="font-semibold text-gray-800">Platform Status</p>
                                        <p class="text-gray-600">System operational & accepting applications</p>
                                    </div>
                                    <div class="text-green-600">
                                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Most Viewed Jobs (Only for users with chart access) -->
                @if($canViewCharts)
                    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-800 mb-4">Most Viewed Jobs</h3>
                            <div class="space-y-3">
                                @forelse($mostViewedJobs as $job)
                                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                        <div>
                                            <p class="font-semibold text-gray-800">{{ $job->job_title }}</p>
                                            <p class="text-sm text-gray-600">{{ $job->company_name }}</p>
                                        </div>
                                        <div class="flex items-center text-blue-600">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="font-bold">{{ $job->views }}</span>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-gray-500 text-center py-4">No job views yet</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Simple info card for users without chart access -->
                    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-800 mb-4">Quick Overview</h3>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg">
                                    <div>
                                        <p class="font-semibold text-blue-800">Total Active Positions</p>
                                        <p class="text-sm text-blue-600">Currently accepting applications</p>
                                    </div>
                                    <div class="text-2xl font-bold text-blue-700">{{ $activeJobs }}</div>
                                </div>
                                <div class="flex items-center justify-between p-3 bg-purple-50 rounded-lg">
                                    <div>
                                        <p class="font-semibold text-purple-800">Companies Hiring</p>
                                        <p class="text-purple-600">Active employers on platform</p>
                                    </div>
                                    <div class="text-2xl font-bold text-purple-700">{{ $totalEmployers }}</div>
                                </div>
                                <div class="text-center pt-4">
                                    <p class="text-sm text-gray-500">
                                        <strong>Need more insights?</strong><br>
                                        Contact your administrator for "Dashboard View" permission to access detailed analytics.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <!-- Highcharts CDN (Only load if user can view charts) -->
    @if($canViewCharts)
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {

            // Job Category Bar Chart
            Highcharts.chart('job-category-chart', {
                chart: {
                    type: 'column',
                    backgroundColor: 'transparent'
                },
                title: {
                    text: 'Job Posts by Category',
                    style: {
                        fontSize: '16px',
                        color: '#374151'
                    }
                },
                subtitle: {
                    text: 'Total number of job posts in each category'
                },
                xAxis: {
                    categories: @json($categories),
                    title: {
                        text: 'Job Categories'
                    },
                    labels: {
                        rotation: -45,
                        style: {
                            fontSize: '12px'
                        }
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Number of Job Posts'
                    },
                    allowDecimals: false
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            style: {
                                fontSize: '12px',
                                fontWeight: 'bold'
                            }
                        },
                        colorByPoint: true
                    }
                },
                colors: [
                    '#3B82F6', '#10B981', '#F59E0B', '#EF4444', '#8B5CF6',
                    '#06B6D4', '#84CC16', '#F97316', '#EC4899', '#6366F1'
                ],
                series: [{
                    name: 'Job Posts',
                    data: @json($jobCounts),
                    showInLegend: false
                }],
                credits: {
                    enabled: false
                },
                exporting: {
                    enabled: true,
                    buttons: {
                        contextButton: {
                            menuItems: ['viewFullscreen', 'printChart', 'separator', 'downloadPNG', 'downloadJPEG', 'downloadPDF']
                        }
                    }
                }
            });

            // Job Type Pie Chart
            var jobTypeData = @json($jobTypeData);
            var pieData = jobTypeData.map(function (item) {
                return {
                    name: item.job_type.charAt(0).toUpperCase() + item.job_type.slice(1),
                    y: item.total
                };
            });

            Highcharts.chart('job-type-chart', {
                chart: {
                    type: 'pie',
                    backgroundColor: 'transparent'
                },
                title: {
                    text: 'Job Type Distribution',
                    style: {
                        fontSize: '16px',
                        color: '#374151'
                    }
                },
                subtitle: {
                    text: 'Distribution of jobs by employment type'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        },
                        showInLegend: true
                    }
                },
                colors: [
                    '#3B82F6', '#10B981', '#F59E0B', '#EF4444', '#8B5CF6'
                ],
                series: [{
                    name: 'Jobs',
                    data: pieData
                }],
                credits: {
                    enabled: false
                },
                exporting: {
                    enabled: true
                }
            });
        });
        </script>
    @endif
</x-app-layout>