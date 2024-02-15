<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('guestboard') }}
        </h2>
    </x-slot>

<div>
    @foreach($jobs as $job)
        <div>
            <h2>{{ $job->job_title }}</h2>
            <p>{{ $job->content }}</p>
        </div>
    @endforeach
</div>
</x-app-layout>