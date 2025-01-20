<?php include __DIR__ . "/../partials/header.php" ?>

<!-- Course Header -->
<div class="bg-gradient-to-r from-indigo-600 to-blue-500 text-white py-12">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Course Info -->
            <div class="md:w-2/3">
                <div class="flex items-center space-x-2 mb-4">
                    <span class="px-3 py-1 bg-white/20 rounded-full text-sm"><?php echo $course['category_name']; ?></span>
                </div>
                <h1 class="text-3xl md:text-4xl font-bold mb-4"><?php echo $course['title']; ?></h1>
                <p class="text-indigo-100 mb-6"><?php echo $course['description']; ?></p>
                <div class="flex items-center space-x-4 mb-4">
                    <div class="flex items-center space-x-2">
                        <img src="/api/placeholder/40/40" alt="Instructor" class="w-10 h-10 rounded-full">
                        <div>
                            <p class="font-medium"><?php echo $course['first_name'] . ' ' . $course['last_name']; ?></p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4 text-sm">
                        <span class="flex items-center"><i class="fas fa-user mr-1"></i> <?php echo $course['enrolled_students']; ?></span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Course Content -->
<div class="max-w-7xl mx-auto px-4 py-8">
    <!-- Tabs -->
    <div class="border-b mb-8">
        <div class="flex space-x-8">
            <button class="px-4 py-2 border-b-2 border-indigo-600 text-indigo-600 font-medium">Content</button>
        </div>
    </div>

    <!-- Content Sections -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl p-6 shadow-sm mb-6">
                <h2 class="text-2xl font-bold mb-4">Course Description</h2>
                <p class="text-gray-600 mb-4">
                    <?php echo $course['description'] ?>
                </p>
            </div>

            <!-- Course Curriculum -->
            <div class="bg-white rounded-xl p-6 shadow-sm">
                <h2 class="text-2xl font-bold mb-4">Course Curriculum</h2>
                <!-- Section 1 -->
                <div class="border rounded-lg mb-4">
                    <h3 class="text-lg font-bold m-2"><?php echo $course['title']; ?></h3>
                    <div class="flex items-center justify-between p-4 cursor-pointer hover:bg-gray-50">
                        <div class="w-full">
                            <iframe src="<?php echo $course['content_cdn'] ?>" frameborder="0" allowfullscreen class="w-full h-64"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>