<?php include __DIR__ . "/../partials/header.php"; ?>

<!-- Main Content -->
<main class="max-w-7xl mx-auto px-4 py-8">
    <!-- Welcome Section -->
    <div class="bg-gradient-to-r from-indigo-600 to-blue-500 rounded-2xl text-white p-8 mb-8">
        <div class="max-w-3xl">
            <h1 class="text-4xl font-bold mb-4">Welcome to Youdemy</h1>
            <p class="text-xl text-indigo-100 mb-6">Discover your potential with our extensive collection of courses. Start learning today and transform your future.</p>
            <div class="flex items-center space-x-4">
                <a href="login.html" class="bg-white text-indigo-600 px-6 py-2 rounded-lg font-semibold hover:bg-indigo-50 transition-colors">
                    Get Started
                </a>
            </div>
        </div>
    </div>

    <!-- Course Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Course Card -->
         <?php foreach ($courses as $course): ?>
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <img src="https://imgs.search.brave.com/EGqm4HJm7tNfNqNsYcEvAr0_fIb-EdneZ77mYaObBzE/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/c2N1LmVkdS9tZWRp/YS9tb2JpL3Nlc3Np/b24taW1hZ2VzLWFu/ZC1zY3JlZW5zaG90/cy9NQUItNTAweDUw/MC5wbmc" alt="Course thumbnail" class="w-full h-48 object-cover">
            <div class="p-6">
                <div class="flex items-center space-x-2 mb-2">
                    <span class="px-2 py-1 bg-indigo-100 text-indigo-800 text-xs rounded-full">Development</span>
                </div>
                <h3 class="text-xl font-bold mb-2"><?php echo $course['title'] ?></h3>
                <p class="text-gray-600 mb-4 line-clamp-2"><?php echo $course['description'] ?></p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <img src="/api/placeholder/32/32" alt="Instructor" class="w-8 h-8 rounded-full">
                        <span class="text-sm text-gray-600">John Doe</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="#" class="bg-white text-indigo-600 px-6 py-2 rounded-lg font-semibold hover:bg-indigo-50 transition-colors">
                            Enroll
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>

    <!-- Pagination -->
    <div class="flex justify-center mt-8 space-x-2">
        <button class="px-4 py-2 border rounded-lg hover:bg-gray-50">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="px-4 py-2 border rounded-lg bg-indigo-600 text-white">1</button>
        <button class="px-4 py-2 border rounded-lg hover:bg-gray-50">2</button>
        <button class="px-4 py-2 border rounded-lg hover:bg-gray-50">3</button>
        <button class="px-4 py-2 border rounded-lg hover:bg-gray-50">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
</main>
</body>

</html>