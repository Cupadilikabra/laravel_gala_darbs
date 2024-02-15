<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('edit') }}
        </h2>
    </x-slot> --}}
    <div class="container mx-auto">
        <h1 class="text-2xl text-center mb-8">Update Job</h1>
        <form method="POST" action="{{ route('jobs.update', $job->id) }}">
            @csrf
            @method('PUT')

            <div class="mx-auto max-w-md p-6 bg-gray-800 rounded-md shadow-md">
                <div class="mb-4">
                    <label for="job_title" class="block text-white font-bold mb-2">Job Title:</label>
                    <input type="text"
                        class="form-input rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        id="job_title" name="job_title" value="{{ old('job_title', $job->job_title) }}" required>
                </div>

                <div class="mb-4">
                    <label for="job_description" class="block text-white font-bold mb-2">Job Description:</label>
                    <textarea
                        class="form-textarea h-32 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        id="job_description" name="job_description">{{ old('job_description', $job->job_description) }}</textarea>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="job_category" class="block text-white font-bold mb-2">Job Category:</label>
                        <input type="text"
                            class="form-input rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            id="job_category" name="job_category" value="{{ old('job_category', $job->job_category) }}"
                            maxlength="100">
                    </div>

                    <div class="mb-4">
                        <label for="job_location" class="block text-white font-bold mb-2">Job Location:</label>
                        <input type="text"
                            class="form-input rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            id="job_location" name="job_location" value="{{ old('job_location', $job->job_location) }}"
                            maxlength="100">
                    </div>

                    <div class="mb-4">
                        <label for="job_salary" class="block text-white font-bold mb-2">Job Salary:</label>
                        <input type="number" step="0.01"
                            class="form-input rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            id="job_salary" name="job_salary" value="{{ old('job_salary', $job->job_salary) }}">
                    </div>

                    <div class="mb-4">
                        <label for="job_posted_date" class="block text-white font-bold mb-2">Job Posted Date:</label>
                        <input type="date"
                            class="form-input rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            id="job_posted_date" name="job_posted_date"
                            value="{{ old('job_posted_date', $job->job_posted_date) }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="job_expiry_date" class="block text-white font-bold mb-2">Job Expiry Date:</label>
                        <input type="date"
                            class="form-input rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            id="job_expiry_date" name="job_expiry_date"
                            value="{{ old('job_expiry_date', $job->job_expiry_date) }}" required>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Job</button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
