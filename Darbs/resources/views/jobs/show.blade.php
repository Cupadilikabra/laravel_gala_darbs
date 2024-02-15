
<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Job Details') }}
        </h2>
    </x-slot> --}}

    <body class="bg-gray-100">
        <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-4">
                <div class="px-4 py-5 sm:px-6 bg-gray-800">
                    <h2 class="text-xl text-white font-semibold">{{ $job->job_title }}</h2>
                </div>
                <div class="px-4 py-5 sm:px-6">
                    <p class="text-lg font-semibold mb-2">Description:</p>
                    <p class="text-gray-700 leading-relaxed mb-4">{!! nl2br($job->job_description) !!}</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <p class="text-lg font-semibold mb-2">Category:</p>
                            <p class="text-gray-700">{{ $job->job_category }}</p>
                        </div>
                        <div>
                            <p class="text-lg font-semibold mb-2">Location:</p>
                            <p class="text-gray-700">{{ $job->job_location }}</p>
                        </div>
                        <div>
                            <p class="text-lg font-semibold mb-2">Salary:</p>
                            <p class="text-gray-700">${{ $job->job_salary }}</p>
                        </div>
                        <div>
                            <p class="text-lg font-semibold mb-2">Posted Date:</p>
                            <p class="text-gray-700">{{ $job->job_posted_date->format('d.m.Y') }}</p>
                        </div>
                        <div>
                            <p class="text-lg font-semibold mb-2">Expiry Date:</p>
                            <p class="text-gray-700">{{ $job->job_expiry_date->format('d.m.Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</x-app-layout>
