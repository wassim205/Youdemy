<?php include __DIR__ . "/../partials/header.php" ?>

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


        <!-- Course Management Tabs -->
        <div class="mb-8">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8">
                    <a href="/Youdemy/Teacher" class="border-transparent text-gray-500 hover:text-gray-700 whitespace-nowrap py-4 px-1 border-b-2 font-medium">
                        My Courses
                    </a>
                    <a href="/Youdemy/Teacher/statistics" class="border-indigo-600 text-indigo-600 whitespace-nowrap py-4 px-1 border-b-2 font-medium">
                        Statistics
                    </a>
                    <a href="/Youdemy/Teacher/StudentManagement" class="border-transparent text-gray-500 hover:text-gray-700 whitespace-nowrap py-4 px-1 border-b-2 font-medium">
                        Student Management
                    </a>
                </nav>
            </div>
        </div>
        <!-- Detailed Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Course Performance -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="text-lg font-semibold mb-4">Course Performance</h3>
                <div class="space-y-4">
                    <?php foreach ($displayMyCourses as $course) : ?>
                    <div class="border-b pb-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-600"><?php echo $course['title'] ?></span>
                            <span class="text-indigo-600 font-semibold"><?php echo $enrolledStudentsForCourses[$course['id']] ?> Enrolled</span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </main>
</body>
</html>