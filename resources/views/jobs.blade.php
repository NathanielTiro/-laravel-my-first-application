<x-layout>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>

    <div class="max-w-4xl mx-auto space-y-6">

        @foreach ($jobs as $job)
        <div class="bg-gray-900 rounded-2xl shadow-md p-6 hover:shadow-xl transition">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-blue-400">{{ $job['title'] }}</h2>
                <span class="text-gray-400 text-sm">{{ $job['employer'] ?? 'Company Name' }}</span>
            </div>
            <p class="text-gray-300 mt-2">Salary: <span class="text-white">{{ $job['salary'] }}</span></p>
            <p class="text-gray-400 mt-1 text-sm">Location: {{ $job['location'] ?? 'Remote' }}</p>
            <div class="mt-4">
                <a href="/jobs/{{ $job['id'] }}"
                   class="inline-block px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                    View Details
                </a>
            </div>
        </div>
        @endforeach

        <!-- If no jobs -->
        @if (count($jobs) === 0)
        <p class="text-gray-400 text-center">No jobs available at the moment.</p>
        @endif

    </div>
</x-layout>
