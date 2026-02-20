<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <!-- Total Books Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-200 hover:shadow-lg transition-all duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-indigo-50 rounded-xl">
                                <svg class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <span class="text-xs font-black text-indigo-400 uppercase tracking-widest">Stats</span>
                        </div>
                        <div class="text-3xl font-black text-gray-900">{{ \App\Models\Book::count() }}</div>
                        <div class="text-sm font-bold text-gray-500 uppercase tracking-tight">Total Books</div>
                    </div>
                </div>

                <!-- Total Reviews Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-200 hover:shadow-lg transition-all duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-emerald-50 rounded-xl">
                                <svg class="h-6 w-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                </svg>
                            </div>
                            <span class="text-xs font-black text-emerald-400 uppercase tracking-widest">Stats</span>
                        </div>
                        <div class="text-3xl font-black text-gray-900">{{ \App\Models\Review::count() }}</div>
                        <div class="text-sm font-bold text-gray-500 uppercase tracking-tight">Total Reviews</div>
                    </div>
                </div>

                <!-- Total Users Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-200 hover:shadow-lg transition-all duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-amber-50 rounded-xl">
                                <svg class="h-6 w-6 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <span class="text-xs font-black text-amber-400 uppercase tracking-widest">Stats</span>
                        </div>
                        <div class="text-3xl font-black text-gray-900">{{ \App\Models\User::count() }}</div>
                        <div class="text-sm font-bold text-gray-500 uppercase tracking-tight">Total Users</div>
                    </div>
                </div>

                <!-- Average Rating Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-200 hover:shadow-lg transition-all duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-rose-50 rounded-xl">
                                <svg class="h-6 w-6 text-rose-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-1.733 2.368-2.428 1.665l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.695.703-2.728-.743-2.428-1.665l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.783-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                </svg>
                            </div>
                            <span class="text-xs font-black text-rose-400 uppercase tracking-widest">Stats</span>
                        </div>
                        <div class="text-3xl font-black text-gray-900">{{ number_format(\App\Models\Review::avg('rating'), 1) ?? '0.0' }}</div>
                        <div class="text-sm font-bold text-gray-500 uppercase tracking-tight">Average Rating</div>
                    </div>
                </div>
            </div>

            <!-- Registration Chart Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200 mb-6">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-bold text-gray-800 uppercase tracking-tight">User Growth</h3>
                        <p class="text-sm text-gray-500">New registrations by date</p>
                    </div>
                    <div class="p-2 bg-indigo-50 rounded-lg">
                        <svg class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16" />
                        </svg>
                    </div>
                </div>
                <div class="p-6">
                    <div style="height: 300px;">
                        <canvas id="registrationChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-100">
                <div class="p-6 text-gray-900 flex items-center">
                    <div class="mr-4 p-2 bg-amber-100 rounded-full">
                        <svg class="h-5 w-5 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span>{{ __("Welcome back, ") }} <span
                            class="font-bold text-indigo-700">{{ Auth::user()->name }}</span>! You are logged in to the
                        admin panel.</span>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const ctx = document.getElementById('registrationChart').getContext('2d');
                const data = @json($registrationData);

                const labels = data.map(item => item.date);
                const counts = data.map(item => item.count);

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'New Users',
                            data: counts,
                            borderColor: 'rgb(79, 70, 229)',
                            backgroundColor: 'rgba(79, 70, 229, 0.1)',
                            borderWidth: 4,
                            fill: true,
                            tension: 0.4,
                            pointRadius: 6,
                            pointHoverRadius: 8,
                            pointBackgroundColor: 'white',
                            pointBorderColor: 'rgb(79, 70, 229)',
                            pointBorderWidth: 2,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        interaction: {
                            intersect: false,
                            mode: 'index',
                        },
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                backgroundColor: 'rgba(255, 255, 255, 0.9)',
                                titleColor: '#1f2937',
                                bodyColor: '#4f46e5',
                                bodyFont: {
                                    weight: 'bold'
                                },
                                borderColor: '#e5e7eb',
                                borderWidth: 1,
                                padding: 12,
                                displayColors: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1,
                                    color: '#9ca3af',
                                    font: {
                                        size: 11
                                    }
                                },
                                grid: {
                                    color: 'rgba(0, 0, 0, 0.05)',
                                    drawBorder: false
                                }
                            },
                            x: {
                                ticks: {
                                    color: '#9ca3af',
                                    font: {
                                        size: 11
                                    }
                                },
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>