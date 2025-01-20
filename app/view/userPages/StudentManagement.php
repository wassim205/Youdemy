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
                <a href="/Youdemy/Teacher/statistics" class="border-transparent text-gray-500 hover:text-gray-700 whitespace-nowrap py-4 px-1 border-b-2 font-medium">
                    Statistics
                </a>
                <a href="/Youdemy/Teacher/StudentManagement" class="border-indigo-600 text-indigo-600 whitespace-nowrap py-4 px-1 border-b-2 font-medium">
                    Student Management
                </a>
            </nav>
        </div>
    </div>
    <!-- Students Managing -->
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-200">
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Student Name
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Course Title
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <!-- Enrolled Student -->
                <?php foreach ($enrolleStatus as $student): ?>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                    <span class="text-blue-600 font-medium"><?php echo $student['first_name'][0] ?></span>
                                </div>
                                <span class="font-medium text-gray-900"><?php echo $student['first_name'] . ' ' . $student['last_name']; ?></span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                    <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                                </svg>
                                <span class="text-gray-900"><?php echo $student['title']; ?></span>
                            </div>
                        </td>
                        <?php if ($student['status'] === 'enrolled'): ?>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                    <span class="w-2 h-2 mr-2 rounded-full bg-green-400"></span>
                                    Enrolled
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <i class="fas fa-check text-green-500"></i>
                            </td>
                        <?php elseif ($student['status'] === 'pending') : ?>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-orange-100 text-orange-800">
                                    <span class="w-2 h-2 mr-2 rounded-full bg-orange-400"></span>
                                    Pending
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                  <a href="/Youdemy/Teacher/update-status?student_id=<?php echo $student['id'] ?>&course_id=<?php echo $student['course_id'] ?>" class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-green-500 rounded-lg hover:bg-green-600 focus:ring-4 focus:ring-green-200 transition-colors">
                                    Enroll
                                </a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</main>
</body>

</html>