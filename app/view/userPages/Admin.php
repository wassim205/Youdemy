<?php


function updateUserStatus($userId, $status)
{
    // Update user status (active/inactive)
    // Add your database logic here
}

function updateTeacherStatus($teacherId, $status)
{
    // Update teacher status (active/inactive)
    // Add your database logic here
}

function updateCourseStatus($courseId, $status)
{
    // Update course status (active/inactive)
    // Add your database logic here
}

?>

<?php include __DIR__ . "/../partials/header.php";

if ($_SERVER['REQUEST_URI'] != "/" && $_SESSION['user_loged_in_role'] != 'admin') {
    header("Location: /");
}
?>

<div class="min-h-screen">

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 py-8">
        <!-- Tabs -->
        <div class="mb-8">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8">
                    <button onclick="showTab('users')" class="tab-btn border-indigo-500 text-indigo-600 py-4 px-1 border-b-2 font-medium">Users</button>
                    <button onclick="showTab('teachers')" class="tab-btn border-transparent text-gray-500 hover:border-gray-300 py-4 px-1 border-b-2 font-medium">Teachers</button>
                    <button onclick="showTab('courses')" class="tab-btn border-transparent text-gray-500 hover:border-gray-300 py-4 px-1 border-b-2 font-medium">Courses</button>
                    <button onclick="showTab('categories')" class="tab-btn border-transparent text-gray-500 hover:border-gray-300 py-4 px-1 border-b-2 font-medium">Categories</button>
                    <button onclick="showTab('tags')" class="tab-btn border-transparent text-gray-500 hover:border-gray-300 py-4 px-1 border-b-2 font-medium">Tags</button>
                </nav>
            </div>
        </div>

        <!-- Users Table -->
        <div id="users-tab" class="tab-content">
            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
                    <h3 class="text-lg font-medium text-gray-900">Users Management</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap"><?php echo $user['first_name'] . ' ' . $user['last_name']; ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap"><?php echo $user['email']; ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap"><?php echo $user['role']; ?></td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="/Youdemy/Admin/Delete?StudentId=<?php echo $user['id']; ?>"
                                            class="text-red-600 hover:text-red-900">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Teachers Table -->
        <div id="teachers-tab" class="tab-content hidden">
            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
                    <h3 class="text-lg font-medium text-gray-900">Teachers Management</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Courses</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php foreach ($teachers as $teacher): ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap"><?php echo $teacher['first_name'] . ' ' . $teacher['last_name']; ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap"><?php echo $teacher['email']; ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap"><?php echo $teacher['course_num']; ?></td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="/Youdemy/Admin/Delete?TeacherId=<?php echo $teacher['id']; ?>"
                                            class="text-red-600 hover:text-red-900">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Courses Table -->
        <div id="courses-tab" class="tab-content hidden">
            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
                    <h3 class="text-lg font-medium text-gray-900">Courses Statistiques</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Teacher</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Category</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Students Enrolled</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php foreach ($courses as $course): ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap"><?php echo $course['title']; ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap"><?php echo $course['first_name'] . ' ' . $course['last_name']; ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap"><?php echo $course['category_name']; ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap"><?php echo $course['enrolled_students']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Categories Table -->
        <div id="categories-tab" class="tab-content hidden">
            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Categories Management</h3>
                        <form method="POST">
                            <div class="flex gap-2">
                                <input name="new-cat" type="text" id="new-category" placeholder="New category name"
                                    class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <button type="submit" name="addCategory"
                                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                                    Add Category
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Category Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php foreach ($categories as $category): ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap"><?php echo $category['name']; ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="/Youdemy/Admin/Delete?CategoryId=<?php echo $category['id']; ?>"
                                            class="text-red-600 hover:text-red-900">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Tags Table -->
        <div id="tags-tab" class="tab-content hidden">
            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Tags Management</h3>
                        <form method="POST">
                            <div class="flex gap-2">
                                <input name="new-tag" type="text" id="new-tag" placeholder="New tag name"
                                    class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <button type="submit" name="addTag"
                                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                                    Add Tag
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tag Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php foreach ($tags as $tag): ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap"><?php echo $tag['name']; ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="/Youdemy/Admin/Delete?TagId=<?php echo $tag['id']; ?>"
                                    class="text-red-600 hover:text-red-900">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
    function showTab(tabName) {
        // Hide all tabs
        document.querySelectorAll('.tab-content').forEach(tab => {
            tab.classList.add('hidden');
        });

        // Show selected tab
        document.getElementById(tabName + '-tab').classList.remove('hidden');

        // Update tab buttons
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('border-indigo-500', 'text-indigo-600');
            btn.classList.add('border-transparent', 'text-gray-500');
        });

        // Highlight selected tab button
        event.target.classList.remove('border-transparent', 'text-gray-500');
        event.target.classList.add('border-indigo-500', 'text-indigo-600');
    }
</script>
</body>

</html>