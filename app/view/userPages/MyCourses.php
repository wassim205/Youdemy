<?php include __DIR__ . "/../partials/header.php" ?>

<!-- Main Content -->
<main class="max-w-7xl mx-auto px-4 py-8">
    <!-- Page Header -->
    <div class="bg-gradient-to-r from-indigo-600 to-blue-500 rounded-2xl text-white p-8 mb-8">
        <div class="max-w-3xl">
            <h1 class="text-4xl font-bold mb-4">My Courses</h1>
            <p class="text-xl text-indigo-100">Continue your learning journey. Track your progress and pick up where you left off.</p>
        </div>
    </div>

    <!-- Course Categories -->
    <div class="flex space-x-4 mb-6">
        <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg">All Courses</button>
        <button class="px-4 py-2 bg-white text-gray-600 rounded-lg hover:bg-gray-50">In Progress</button>
        <button class="px-4 py-2 bg-white text-gray-600 rounded-lg hover:bg-gray-50">Completed</button>
    </div>

    <!-- Course Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Course Card 1 -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <img src="https://imgs.search.brave.com/EGqm4HJm7tNfNqNsYcEvAr0_fIb-EdneZ77mYaObBzE/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/c2N1LmVkdS9tZWRp/YS9tb2JpL3Nlc3Np/b24taW1hZ2VzLWFu/ZC1zY3JlZW5zaG90/cy9NQUItNTAweDUw/MC5wbmc" alt="Course thumbnail" class="w-full h-48 object-cover">
            <div class="p-6">
                <div class="flex items-center space-x-2 mb-2">
                    <span class="px-2 py-1 bg-indigo-100 text-indigo-800 text-xs rounded-full">Development</span>
                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">In Progress</span>
                </div>
                <h3 class="text-xl font-bold mb-2">Complete Web Development Course</h3>
                <div class="mb-4">
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-indigo-600 h-2 rounded-full" style="width: 65%"></div>
                    </div>
                    <span class="text-sm text-gray-600">65% Complete</span>
                </div>
                <a href="#" class="block text-center bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition-colors">
                    Continue Learning
                </a>
            </div>
        </div>

        <!-- Course Card 2 -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <img src="https://imgs.search.brave.com/3pbWOMtMLfrbdsrHaoT5lmhJ3PMGP3MQZ_D7iAyoLDI/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9jYW1w/dXMudzNzY2hvb2xz/LmNvbS9jZG4vc2hv/cC9maWxlcy9jb2Rp/bmctb24tbGFwdG9w/XzE1MDB4MTAwMS5q/cGc_dj0xNjU0NjA3/MzI4" alt="Course thumbnail" class="w-full h-48 object-cover">
            <div class="p-6">
                <div class="flex items-center space-x-2 mb-2">
                    <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">Business</span>
                    <span class="px-2 py-1 bg-purple-100 text-purple-800 text-xs rounded-full">Completed</span>
                </div>
                <h3 class="text-xl font-bold mb-2">Business Strategy Masterclass</h3>
                <div class="mb-4">
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-indigo-600 h-2 rounded-full w-full"></div>
                    </div>
                    <span class="text-sm text-gray-600">100% Complete</span>
                </div>
                <a href="#" class="block text-center bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition-colors">
                    View Certificate
                </a>
            </div>
        </div>

        <!-- Course Card 3 -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <img src="/api/placeholder/400/320" alt="Course thumbnail" class="w-full h-48 object-cover">
            <div class="p-6">
                <div class="flex items-center space-x-2 mb-2">
                    <span class="px-2 py-1 bg-red-100 text-red-800 text-xs rounded-full">Design</span>
                    <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">Just Started</span>
                </div>
                <h3 class="text-xl font-bold mb-2">UI/UX Design Fundamentals</h3>
                <div class="mb-4">
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-indigo-600 h-2 rounded-full" style="width: 15%"></div>
                    </div>
                    <span class="text-sm text-gray-600">15% Complete</span>
                </div>
                <a href="#" class="block text-center bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition-colors">
                    Continue Learning
                </a>
            </div>
        </div>
    </div>
</main>
</body>
</html>