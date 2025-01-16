<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Course Catalog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-indigo-600 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <i class="fas fa-book text-2xl"></i>
                    <span class="text-xl font-bold">Youdemy</span>
                </div>

                <!-- Search Bar -->
                <div class="hidden md:block flex-1 max-w-xl mx-4">
                    <div class="relative">
                        <input id="search-input" type="text" placeholder="Search for courses..."
                            class="w-full px-4 py-2 pl-10 pr-8 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-400" oninput="searchCourses(this.value)">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="flex items-center space-x-6">
                    <?php if (isset($_SESSION["user_loged_in_role"]) && $_SESSION["user_loged_in_role"] == "student"): ?>
                        <?php if ($_SERVER["REQUEST_URI"] == "/Youdemy/Student/MyCourses"): ?>
                            <a href="/Youdemy/Student" class="hover:text-indigo-200 flex items-center space-x-1">
                                <i class="fa-solid fa-house"></i>
                                <span>Home</span>
                            </a>
                        <?php else: ?>
                            <a href="/Youdemy/Student/MyCourses" class="hover:text-indigo-200 flex items-center space-x-1">
                                <i class="fas fa-graduation-cap"></i>
                                <span>My Courses</span>
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if (!isset($_SESSION["user_loged_in_role"]) || $_SESSION["user_loged_in_role"] != "student"): ?>
                        <div class="relative group" id="dropdown">
                            <button class="flex items-center space-x-1 hover:text-indigo-200">
                                <i class="fas fa-user-circle text-xl"></i>
                                <span>Account</span>
                            </button>
                            <!-- Dropdown Menu -->
                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 dropdownGroup hidden">
                                <a href="login" class="block px-4 py-2 text-green-800 hover:bg-green-50">Log in</a>
                                <hr class="my-2">
                                <a href="signup" class="block px-4 py-2 text-red-600 hover:bg-red-50">Sign Up</a>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="relative group" id="dropdownStudent">
                            <button class="flex items-center space-x-1 hover:text-indigo-200">
                                <i class="fas fa-user-circle text-xl"></i>
                                <span>Account</span>
                            </button>
                            <!-- Dropdown Menu -->
                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 dropdownGroupStudent hidden">
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-indigo-50">Profile</a>
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-indigo-50">Settings</a>
                                <hr class="my-2">
                                <a href="/logout" class=" block px-4 py-2 text-red-600 hover:bg-red-50">Log Out</a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <script src="/assets/js/Dropdown.js"></script>