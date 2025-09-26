<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>

    <p class="text-sm text-gray-500">{{ $job->employer->name }}</p>
    <h2 class="font-bold text-lg">{{ $job['title'] }}</h2>
    <p>
        This job pays {{ $job['salary'] }} per year.
    </p>

    <div class="mt-4">
        <!-- ✅ Use named route for edit -->
        <a href="{{ route('jobs.edit', $job) }}"
            class="rounded-lg bg-blue-500 text-black px-4 py-2 hover:bg-blue-400">
            Edit Job
        </a>
    </div>
</x-layout>
