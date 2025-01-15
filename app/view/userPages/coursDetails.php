<?php include __DIR__ . "/../partials/header.php" ?>

    <!-- Course Header -->
    <div class="bg-gradient-to-r from-indigo-600 to-blue-500 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Course Info -->
                <div class="md:w-2/3">
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="px-3 py-1 bg-white/20 rounded-full text-sm">Development</span>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-bold mb-4">Complete Web Development Course</h1>
                    <p class="text-indigo-100 mb-6">Master the fundamentals of web development with this comprehensive course. Learn HTML, CSS, JavaScript, and modern frameworks.</p>
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="flex items-center space-x-2">
                            <img src="/api/placeholder/40/40" alt="Instructor" class="w-10 h-10 rounded-full">
                            <div>
                                <p class="font-medium">John Doe</p>
                                <p class="text-sm text-indigo-200">Senior Web Developer</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4 text-sm">
                            <span class="flex items-center"><i class="fas fa-star mr-1"></i> 4.8 (2.4k reviews)</span>
                            <span class="flex items-center"><i class="fas fa-user mr-1"></i> 12.5k students</span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button class="bg-white text-indigo-600 px-6 py-2 rounded-lg font-semibold hover:bg-indigo-50 transition-colors">
                            Enroll Now
                        </button>
                    </div>
                </div>
                <!-- Course Preview -->
                <div class="md:w-1/3">
                    <div class="bg-white rounded-xl shadow-lg p-6 text-gray-800">
                        <img src="/api/placeholder/400/225" alt="Course preview" class="w-full rounded-lg mb-4">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="flex items-center"><i class="fas fa-video mr-2"></i> 42 lectures</span>
                                <span class="flex items-center"><i class="fas fa-clock mr-2"></i> 12.5 hours</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="flex items-center"><i class="fas fa-certificate mr-2"></i> Certificate</span>
                                <span class="flex items-center"><i class="fas fa-infinity mr-2"></i> Lifetime Access</span>
                            </div>
                            <button class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors">
                                Start Learning Now
                            </button>
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
                <button class="px-4 py-2 border-b-2 border-indigo-600 text-indigo-600 font-medium">Overview</button>
                <button class="px-4 py-2 text-gray-500 hover:text-gray-700">Curriculum</button>
                <button class="px-4 py-2 text-gray-500 hover:text-gray-700">Reviews</button>
                <button class="px-4 py-2 text-gray-500 hover:text-gray-700">Instructor</button>
            </div>
        </div>

        <!-- Content Sections -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl p-6 shadow-sm mb-6">
                    <h2 class="text-2xl font-bold mb-4">Course Description</h2>
                    <p class="text-gray-600 mb-4">
                        This comprehensive web development course is designed to take you from beginner to professional. 
                        You'll learn everything from the basics of HTML and CSS to advanced concepts in JavaScript and modern frameworks.
                    </p>
                    <h3 class="text-xl font-bold mb-3">What you'll learn</h3>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-6">
                        <li class="flex items-start space-x-2">
                            <i class="fas fa-check text-green-500 mt-1"></i>
                            <span>Build responsive websites using HTML5 and CSS3</span>
                        </li>
                        <li class="flex items-start space-x-2">
                            <i class="fas fa-check text-green-500 mt-1"></i>
                            <span>Master JavaScript programming fundamentals</span>
                        </li>
                        <li class="flex items-start space-x-2">
                            <i class="fas fa-check text-green-500 mt-1"></i>
                            <span>Work with modern frameworks and libraries</span>
                        </li>
                        <li class="flex items-start space-x-2">
                            <i class="fas fa-check text-green-500 mt-1"></i>
                            <span>Deploy web applications to production</span>
                        </li>
                    </ul>
                </div>

                <!-- Course Curriculum -->
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <h2 class="text-2xl font-bold mb-4">Course Curriculum</h2>
                    <!-- Section 1 -->
                    <div class="border rounded-lg mb-4">
                        <div class="flex items-center justify-between p-4 cursor-pointer hover:bg-gray-50">
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-chevron-down text-gray-400"></i>
                                <h3 class="font-medium">1. Introduction to Web Development</h3>
                            </div>
                            <span class="text-sm text-gray-500">3 lectures • 45 min</span>
                        </div>
                        <div class="border-t px-4 py-2">
                            <div class="flex items-center justify-between py-2">
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-play-circle text-gray-400"></i>
                                    <span>1.1 Course Overview</span>
                                </div>
                                <span class="text-sm text-gray-500">15:00</span>
                            </div>
                            <div class="flex items-center justify-between py-2">
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-play-circle text-gray-400"></i>
                                    <span>1.2 Setting Up Your Development Environment</span>
                                </div>
                                <span class="text-sm text-gray-500">20:00</span>
                            </div>
                        </div>
                    </div>

                    <!-- Section 2 -->
                    <div class="border rounded-lg">
                        <div class="flex items-center justify-between p-4 cursor-pointer hover:bg-gray-50">
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-chevron-right text-gray-400"></i>
                                <h3 class="font-medium">2. HTML Fundamentals</h3>
                            </div>
                            <span class="text-sm text-gray-500">5 lectures • 1.5 hrs</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl p-6 shadow-sm sticky top-4">
                    <h3 class="text-xl font-bold mb-4">Course Features</h3>
                    <ul class="space-y-4">
                        <li class="flex items-center justify-between">
                            <span class="flex items-center space-x-2">
                                <i class="fas fa-clock text-gray-400"></i>
                                <span>Duration</span>
                            </span>
                            <span class="text-gray-600">12.5 hours</span>
                        </li>
                        <li class="flex items-center justify-between">
                            <span class="flex items-center space-x-2">
                                <i class="fas fa-video text-gray-400"></i>
                                <span>Lectures</span>
                            </span>
                            <span class="text-gray-600">42 lectures</span>
                        </li>
                        <li class="flex items-center justify-between">
                            <span class="flex items-center space-x-2">
                                <i class="fas fa-signal text-gray-400"></i>
                                <span>Skill Level</span>
                            </span>
                            <span class="text-gray-600">Beginner</span>
                        </li>
                        <li class="flex items-center justify-between">
                            <span class="flex items-center space-x-2">
                                <i class="fas fa-globe text-gray-400"></i>
                                <span>Language</span>
                            </span>
                            <span class="text-gray-600">English</span>
                        </li>
                    </ul>
                    <hr class="my-4">
                    <button class="w-full bg-indigo-600 text-white py-2 rounded-lg font-semibold hover:bg-indigo-700 transition-colors">
                        Enroll Now
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>