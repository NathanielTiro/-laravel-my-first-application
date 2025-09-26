<x-layout>
    <x-slot:heading>
        Edit Job
    </x-slot:heading>

    <!-- ✅ Custom style for placeholder -->
    <style>
        input::placeholder {
            background-color: black;   /* Black background for placeholder */
            color: white;             /* White placeholder text */
            padding: 2px 4px;         /* Optional: spacing so background shows */
        }
    </style>

    <!-- ✅ Use named route for update -->
    <form method="POST" action="{{ route('jobs.update', $job) }}" class="space-y-6">
        @csrf
        @method('PATCH')

        <!-- Job Title -->
        <div>
            <label for="title" class="block text-sm font-medium text-black">Job Title</label>
            <input type="text" name="title" id="title"
                placeholder="Enter job title"
                value="{{ old('title', $job->title) }}"
                class="mt-1 block w-full rounded-md border-black shadow-sm text-white bg-black">
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Salary -->
        <div>
            <label for="salary" class="block text-sm font-medium text-black">Salary</label>
            <input type="text" name="salary" id="salary"
                placeholder="Enter salary"
                value="{{ old('salary', $job->salary) }}"
                class="mt-1 block w-full rounded-md border-black shadow-sm text-white bg-black">
            @error('salary')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Buttons -->
        <div class="flex items-center space-x-4">
            <button type="submit"
                class="rounded-lg bg-blue-600 text-white px-4 py-2 hover:bg-blue-500">
                Update
            </button>

            <!-- Delete Button -->
            <button form="delete-form"
                class="rounded-lg bg-red-600 text-white px-4 py-2 hover:bg-red-500">
                Delete
            </button>
        </div>
    </form>

    <!-- ✅ Use named route for destroy -->
    <form method="POST" action="{{ route('jobs.destroy', $job) }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
