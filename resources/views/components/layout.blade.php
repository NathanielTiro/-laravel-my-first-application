<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $heading ?? 'Dashboard' }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen flex bg-gray-900">
  <!-- Sidebar -->
  <aside class="w-64 bg-black shadow-lg flex flex-col">
    <!-- Heading -->
    <div class="p-6 border-b border-gray-700 text-center">
      <h1 class="text-2xl font-bold text-blue-400 drop-shadow-lg">{{ $heading ?? 'Dashboard' }}</h1>
    </div>

    <!-- Nav Links -->
    <nav class="flex flex-col items-center mt-8 space-y-4">
      <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
      <x-nav-link href="/jobs" :active="request()->is('jobs')">Jobs</x-nav-link>

      <!-- Create Job Button -->
      <a href="/jobs/create"
         class="w-40 text-center rounded-lg bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-lg
                hover:bg-indigo-500 transition">
        + Create Job
      </a>
    </nav>

    <!-- Logout Button pinned at bottom -->
    <div class="mt-auto p-4 border-t border-gray-700">
      <button class="w-full rounded-lg bg-gradient-to-r from-red-500 to-pink-600 text-white py-2 font-semibold shadow-lg hover:from-red-400 hover:to-pink-500 transition">
         Logout
      </button>
    </div>
  </aside>

  <!-- Main Content with Job Listing Background -->
  <main class="flex-1 p-8 overflow-y-auto flex items-center justify-center 
               bg-[url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1350&q=80')] 
               bg-cover bg-center text-white">
    <!-- Overlay box for readability -->
    <div class="bg-black/60 p-10 rounded-xl shadow-xl text-center max-w-2xl">
      {{ $slot }}
    </div>
  </main>
</body>
</html>
