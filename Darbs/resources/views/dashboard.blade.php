<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<x-app-layout class="flex justify-center bg-blue-500">

    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <!-- Most Rated Jobs -->
    <div class="mb-8 px-4">
        <h2 class="text-xl font-bold mb-4">Most Rated Jobs</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-2">
            @foreach ($topRatedJobs as $job)
                <div class="bg-blue-200 p-2 rounded-lg flex flex-col justify-center items-center py-2">
                    <div class="text-center">
                        <h2 class="text-lg font-bold mb-1">
                            <a href="{{ route('jobs.show', $job->id) }}"
                                class="hover:underline">{{ $job->job_title }}</a>
                        </h2>
                        <p class="text-sm text-gray-700 my-1">{{ $job->job_description }}</p>
                        <p class="text-xs text-gray-600 mt-1 mb-1">Average Rating:
                            {{ number_format($job->ratings->avg('rating_value'), 1) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    
    <hr class="my-8 border-blue-800 border-2">

    <!-- Latest Jobs -->
    <div class="px-4">
        <h2 class="text-xl font-bold mb-4">Latest Jobs</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @foreach ($latestJobs as $job)
                <div class="bg-green-200 p-2 rounded-lg flex flex-col justify-center items-center py-2">
                    <div class="text-center">
                        <h2 class="text-lg font-bold mb-1">
                            <a href="{{ route('jobs.show', $job->id) }}"
                                class="hover:underline">{{ $job->job_title }}</a>
                        </h2>
                        <p class="text-sm text-gray-700 my-1">{{ $job->job_description }}</p>
                        <p class="text-xs text-gray-600 mt-1 mb-1">Posted: {{ $job->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
