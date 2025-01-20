<?php include __DIR__ . "/../partials/header.php";
if ($_SERVER['REQUEST_URI'] != "/" && $_SESSION['user_loged_in_role'] != 'teacher') {
    header("Location: /");
}

?>

<!-- Main Content -->
<main class="max-w-7xl mx-auto px-4 py-8">
    <!-- Teacher Stats Overview -->
    <div class="bg-gradient-to-r from-indigo-600 to-blue-500 rounded-2xl text-white p-8 mb-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white/20 rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-2">Total Students</h3>
                <p class="text-3xl font-bold"><?= $studentsEnrolled ?></p>
            </div>
            <div class="bg-white/20 rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-2">Active Courses</h3>
                <p class="text-3xl font-bold"><?= $activeCourses ?></p>
            </div>
            <div class="bg-white/20 rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-2">Total Engagements</h3>
                <p class="text-3xl font-bold"><?= $totalEngagements ?></p>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex space-x-4 mb-8">
        <a href="/AddCourse" class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add New Course
        </a>
    </div>

    <!-- Course Management Tabs -->
    <div class="mb-8">
        <div class="border-b border-gray-200">
            <nav class="-mb-px flex space-x-8">
                <a href="/Youdemy/Teacher" class="border-indigo-600 text-indigo-600 whitespace-nowrap py-4 px-1 border-b-2 font-medium">
                    My Courses
                </a>
                <a href="/Youdemy/Teacher/statistics" class="border-transparent text-gray-500 hover:text-gray-700 whitespace-nowrap py-4 px-1 border-b-2 font-medium">
                    Statistics
                </a>
                <a href="/Youdemy/Teacher/StudentManagement" class="border-transparent text-gray-500 hover:text-gray-700 whitespace-nowrap py-4 px-1 border-b-2 font-medium">
                    Student Management
                </a>
            </nav>
        </div>
    </div>

    <!-- Course List -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($displayMyCourses as $Mycourse) : ?>
            <!-- Course Card 1 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <img src="/api/placeholder/400/300" alt="Course thumbnail" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex items-center space-x-2 mb-2">
                        <span class="px-2 py-1 bg-indigo-100 text-indigo-800 text-xs rounded-full"><?php echo $Mycourse['category_name'] ?></span>
                        <span class="px-2 py-1 bg-indigo-100 text-indigo-800 text-xs rounded-full"><?php echo $Mycourse['tags'] ?></span>
                    </div>
                    <h3 class="text-xl font-bold mb-2"><?php echo $Mycourse['title'] ?></h3>
                    <p class="text-gray-600 mb-4 line-clamp-2"><?php echo $Mycourse['description'] ?></p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-600">CREATED ON : <?php echo date('Y-m-d', strtotime($Mycourse['created_at'])) ?></span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <a href="#" class="text-indigo-600 hover:text-indigo-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </a>
                            <a href="/Youdemy/Teacher/DeleteCourse?id=<?php echo $Mycourse['id'] ?>" class="text-red-600 hover:text-red-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>

</body>

</html>