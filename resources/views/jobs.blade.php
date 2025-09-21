<x-layout>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>

    <div class="max-w-4xl mx-auto space-y-6">

        @foreach ($jobs as $job)
            <div class="bg-gray-900 rounded-2xl shadow-md p-6 hover:shadow-xl transition">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-bold text-blue-400">{{ $job->title }}</h2>
                    <span class="text-gray-400 text-sm">{{ $job->employer->name }}</span>
                </div>

                <p class="text-gray-300 mt-2">
                    Salary: <span class="text-white">{{ $job->salary }}</span>
                </p>
                <p class="text-gray-400 mt-1 text-sm">
                    Location: {{ $job->location ?? 'Remote' }}
                </p>

                <!-- Guide snippet (job summary link) -->
                <p class="mt-3 text-gray-200">
                    <a href="/jobs/{{ $job->id }}" class="text-blue-500 hover:underline">
                        <strong class="text-laracasts">{{ $job->employer->name }}:</strong>
                        {{ $job->title }} pays {{ $job->salary }} per year.
                    </a>
                </p>

                <!-- Tags -->
                <div class="mt-4">
                    @foreach($job->tags as $tag)
                        <span class="bg-gray-200 text-gray-700 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-full">
                            {{ $tag->name }}
                        </span>
                    @endforeach
                </div>

                <!-- Button -->
                <div class="mt-4">
                    <a href="/jobs/{{ $job->id }}"
                       class="inline-block px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                        View Details
                    </a>
                </div>
            </div>
        @endforeach

        <!-- If no jobs -->
        @if ($jobs->isEmpty())
            <p class="text-gray-400 text-center">No jobs available at the moment.</p>
        @endif

    </div>
</x-layout>
