<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<x-app-layout style="background-color: #b87a44;">
    {{-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(' Index') }}
        </h2>
    </x-slot> --}}

    {{-- Filter jobs --}}

    <body>
        <div>
            <form class="flex items-center mb-2" action="{{ route('jobs.sort') }}" method="GET">
                <label for="filter" class="mr-2 text-sm font-medium text-gray-700">Filter by:</label>
                <select name="filter" id="filter"
    class="block appearance-none bg-white border border-gray-300 hover:border-gray-400 px-6 py-2 mb-1 rounded shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm">
    <option value="ratings" class="text-gray-700">Ratings</option>
    <option value="latest" class="text-gray-700">Latest</option>
    <option value="oldest" class="text-gray-700">Oldest</option>
</select>

                <button type="submit"
                    class="mt-4 bg-orange-500 hover:bg-gray-800 transition-colors duration-300 ease-in-out text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Apply
                </button>
            </form>

            <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8 bg-gray-800 border rounded">
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6"
                        role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif
                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6"
                        role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif
                @foreach ($jobs as $job)
                    <div class="bg-white shadow-md rounded-lg mb-4">
                        <div class="px-4 py-5 sm:px-6">
                            <h2 class="text-xl font-semibold text-gray-800">
                                <a href="{{ route('jobs.show', $job->id) }}"
                                    class="hover:underline">{{ $job->job_title }}</a>
                            </h2>
                            <ul class="text-gray-600">
                                <li>Location: {{ $job->job_location }}</li>
                                <li>Posted Date: {{ $job->job_posted_date->format('d.m.Y') }}</li>
                                <li>Expiry Date: {{ $job->job_expiry_date->format('d.m.Y') }}</li>
                                <li>Salary: ${{ $job->job_salary }}</li>
                            </ul>
                        </div>

                        @if ($job->ratings && $job->ratings->isNotEmpty())
                            <div class="flex items-center p-4 border-t border-gray-200">
                                <p class="font-semibold">Rating:</p>
                                <div class="flex items-center ml-2">
                                    @php
                                        $avgRating = $job->ratings->avg('rating_value');
                                        $roundedAvgRating = round($avgRating);
                                    @endphp
                                    @for ($i = 1; $i <= 5; $i++)
                                        <svg class="h-5 w-5 text-{{ $i <= $roundedAvgRating ? 'yellow' : 'gray' }}-400"
                                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                    @endfor
                                    <span class="ml-1">{{ number_format($avgRating, 1) }}</span>
                                </div>
                            </div>
                        @else
                            <p class="p-4 border-t border-gray-200">No ratings yet</p>
                        @endif

                        <form action="{{ route('jobs.rate', $job->id) }}" method="POST"
                            class="border-t border-gray-200 p-4">
                            @csrf
                            <div class="flex items-center mb-2">
                                <label for="rating_value" class="mr-2">Rate this job:</label>
                                <input type="number" id="rating_value" name="rating_value" min="1"
                                    max="5" required
                                    class="border border-gray-300 rounded-md px-3 py-1 focus:outline-none focus:border-indigo-500">
                            </div>
                            <button type="submit" class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800 dark:hover:bg-blue-500">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                <path d="M3 7H1a1 1 0 0 0-1 1v8a2 2 0 0 0 4 0V8a1 1 0 0 0-1-1Zm12.954 0H12l1.558-4.5a1.778 1.778 0 0 0-3.331-1.06A24.859 24.859 0 0 1 6 6.8v9.586h.114C8.223 16.969 11.015 18 13.6 18c1.4 0 1.592-.526 1.88-1.317l2.354-7A2 2 0 0 0 15.954 7Z"/>
                                </svg>
                                <span class="sr-only">Rate</span>
                                </button>
                        </form>
                    </div>
                @endforeach
            </div>

            <!-- Pagination Links -->
            <div class="max-w-4xl mx-auto mt-6 px-4 sm:px-6 lg:px-8">
                {{ $jobs->links() }}
            </div>
        </div>
    </body>
</x-app-layout>
