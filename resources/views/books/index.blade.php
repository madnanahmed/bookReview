<x-app-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800 uppercase tracking-tight">Books</h1>
        <a href="{{ route('books.create') }}"
            class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
            <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add Book
        </a>
    </div>

    @if(session('success'))
        <div class="bg-emerald-100 border-l-4 border-emerald-500 text-emerald-700 p-4 mb-6" role="alert">
            <p class="font-bold">Success</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">
        <form method="GET" action="{{ route('books.index') }}" class="flex flex-wrap items-center gap-4">
            <div class="flex-grow">
                <input type="text" name="title" placeholder="Search by title..." value="{{ request('title') }}"
                    class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm h-10" />
            </div>
            <input type="hidden" name="filter" value="{{ request('filter') }}" />
            <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 h-10">Search</button>
            <a href="{{ route('books.index') }}"
                class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition ease-in-out duration-150 h-10">Clear</a>
        </form>
    </div>

    <div class="filter-container mb-8 flex flex-wrap gap-2">
        @php
            $filters = [
                '' => 'Latest',
                'popular_last_month' => 'Popular Last Month',
                'popular_last_6months' => 'Popular Last 6 Months',
                'highest_rated_last_month' => 'Highest Rated Last Month',
                'highest_rated_last_6months' => 'Highest Rated Last 6 Months',
            ];
        @endphp

        @foreach ($filters as $key => $label)
            <a href="{{ route('books.index', [...request()->query(), 'filter' => $key]) }}"
                class="px-4 py-2 rounded-full text-sm font-medium transition-colors duration-200 {{ request('filter') === $key || (request('filter') === null && $key === '') ? 'bg-indigo-600 text-white shadow-md' : 'bg-white text-gray-600 hover:bg-gray-100 border border-gray-200' }}">
                {{ $label }}
            </a>
        @endforeach
    </div>

    <div class="grid grid-cols-1 gap-6">
        @forelse ($books as $book)
            <div
                class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-200 hover:border-indigo-300 hover:shadow-xl transition-all duration-300 group">
                <div class="p-1 flex flex-col md:flex-row">
                    <div class="p-6 flex-grow flex items-start">
                        <div
                            class="p-4 bg-indigo-50 rounded-xl mr-6 hidden sm:flex items-center justify-center transition-colors group-hover:bg-indigo-100">
                            <svg class="h-10 w-10 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div class="flex-grow">
                            <div class="flex flex-wrap items-center gap-2 mb-1">
                                <h2 class="text-2xl font-black text-gray-900 leading-tight">
                                    <a href="{{ route('books.show', $book) }}"
                                        class="hover:text-indigo-600 transition-colors">{{ $book->title }}</a>
                                </h2>
                            </div>
                            <p class="text-base font-semibold text-gray-500 mb-4">by <span
                                    class="text-indigo-600">{{ $book->author }}</span></p>

                            <div class="flex flex-wrap items-center gap-4">
                                <div
                                    class="flex items-center bg-amber-50 px-3 py-1.5 rounded-full border border-amber-100 shadow-sm">
                                    <div class="flex items-center text-amber-400 mr-2">
                                        <x-star-rating :rating="$book->reviews_avg_rating" />
                                    </div>
                                    <span
                                        class="text-sm font-black text-amber-700">{{ number_format($book->reviews_avg_rating, 1) }}</span>
                                </div>

                                <div
                                    class="flex items-center text-gray-400 text-sm font-bold bg-gray-50 px-3 py-1.5 rounded-full border border-gray-100">
                                    <svg class="h-4 w-4 mr-2 text-indigo-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                    </svg>
                                    {{ $book->reviews_count }} {{ Str::plural('Review', $book->reviews_count) }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-gray-50 md:bg-transparent border-t md:border-t-0 md:border-l border-gray-100 p-6 flex flex-row md:flex-col justify-center gap-3">
                        <a href="{{ route('books.edit', $book) }}"
                            class="flex-1 md:flex-none inline-flex items-center justify-center px-6 py-3 bg-white border border-gray-300 rounded-xl text-sm font-black text-gray-700 hover:bg-indigo-600 hover:text-white hover:border-indigo-600 shadow-sm transition-all duration-200">
                            <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit
                        </a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this book?');"
                            class="flex-1 md:flex-none">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full inline-flex items-center justify-center px-6 py-3 bg-rose-50 border border-rose-100 rounded-xl text-sm font-black text-rose-600 hover:bg-rose-600 hover:text-white hover:border-rose-600 shadow-sm transition-all duration-200">
                                <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div
                class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border-2 border-dashed border-gray-200 p-16 text-center">
                <div class="inline-flex items-center justify-center p-6 bg-indigo-50 rounded-full mb-6">
                    <svg class="h-16 w-16 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h3 class="text-2xl font-black text-gray-900 mb-2">No results found</h3>
                <p class="text-gray-500 mb-8 max-w-sm mx-auto text-lg">Try adjusting your filters or search query to find
                    what you're looking for.</p>
                <a href="{{ route('books.index') }}"
                    class="inline-flex items-center justify-center px-8 py-3 bg-indigo-600 border border-transparent rounded-xl text-base font-black text-white hover:bg-indigo-700 shadow-lg shadow-indigo-200 transition-all active:scale-95">
                    Reset Selection
                </a>
            </div>
        @endforelse
    </div>

</x-app-layout>