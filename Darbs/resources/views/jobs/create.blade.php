<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div style="background-color: #b87a44;" class="py-8">
        <div class="container mx-auto">
            <h1 class="text-2xl text-center mb-8">Create New Job</h1>

            <form method="POST" action="{{ route('jobs.store') }}"
                class="max-w-lg mx-auto bg-gray-800 p-8 shadow-md rounded-lg">
                @csrf
                <div class="mb-4">
                    <label for="job_title" class="block text-white font-bold mb-2">Job Title</label>
                    <input type="text" id="job_title" name="job_title" required
                        class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="job_description" class="block text-white font-bold mb-2">Job Description</label>
                    <textarea id="job_description" name="job_description" rows="5" required
                        class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                </div>
                <div class="mb-4">
                    <label for="job_category" class="block text-white font-bold mb-2">Job Category</label>
                    <input type="text" id="job_category" name="job_category"
                        class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="job_location" class="block text-white font-bold mb-2">Job Location</label>
                    <input type="text" id="job_location" name="job_location"
                        class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="job_salary" class="block text-white font-bold mb-2">Job Salary</label>
                    <input type="text" id="job_salary" name="job_salary"
                        class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="job_posted_date" class="block text-white font-bold mb-2">Job Posted Date</label>
                    <input type="date" id="job_posted_date" name="job_posted_date" required
                        class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="job_expiry_date" class="block text-white font-bold mb-2">Job Expiry Date</label>
                    <input type="date" id="job_expiry_date" name="job_expiry_date" required
                        class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="company_id" class="block text-white font-bold mb-2">Company ID</label>
                    <input type="text" id="company_id" name="company_id"
                        class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                    Create Job
                </button>
            </form>
        </div>
</x-app-layout>
