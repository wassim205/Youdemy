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
    </div>

    <!-- Course Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Course Card 1 -->
         <?php foreach($courses as $course): ?>
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <img src="https://imgs.search.brave.com/EGqm4HJm7tNfNqNsYcEvAr0_fIb-EdneZ77mYaObBzE/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/c2N1LmVkdS9tZWRp/YS9tb2JpL3Nlc3Np/b24taW1hZ2VzLWFu/ZC1zY3JlZW5zaG90/cy9NQUItNTAweDUw/MC5wbmc" alt="Course thumbnail" class="w-full h-48 object-cover">
            <div class="p-6">
                <div class="flex items-center space-x-2 mb-2">
                    <span class="px-2 py-1 bg-indigo-100 text-indigo-800 text-xs rounded-full"><?php echo $course['category_name']; ?></span>
                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full"><?php echo $course['tags']; ?></span>
                </div>
                <h3 class="text-xl font-bold mb-2"><?php echo $course['title']; ?></h3>
                <div class="mb-4">
                </div>
                <a href="/Youdemy/Student/CourseDetails?course_id=<?php echo $course['id'] ?>" class="block text-center bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition-colors">
                    Continue Learning
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</main>
</body>

</html>