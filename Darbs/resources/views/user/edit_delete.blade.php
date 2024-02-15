<x-app-layout>
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg ">
                <div class="p-6 bg-gray-800 border-b border-gray-200">
                    <h1 class="text-2xl text-white font-bold mb-4">My Job Posts </h1>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Title
                                </th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($jobs as $job)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-sm leading-5 font-medium text-gray-900">{{ $job->job_title }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="flex items-center space-x-4">
                                            <a href="{{ route('jobs.edit', $job->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            <form action="{{ route('jobs.delete', $job->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-900">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
