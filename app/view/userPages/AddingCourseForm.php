<?php include __DIR__ . "/../partials/header.php" ?>


    <main class="max-w-4xl mx-auto px-4 py-8">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Add New Course</h1>
            <p class="mt-2 text-gray-600">Create a new course by filling out the information below</p>
        </div>

        <!-- Course Creation Form -->
        <form action="/Youdemy/Teacher" method="post" class="bg-white rounded-xl shadow-md p-8">
            <!-- Basic Information -->
            <div class="space-y-6">
                <!-- Course Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Course Title</label>
                    <input type="text" name="title" id="title" required
                        class="mt-1 block w-full rounded-md border border-gray-400 p-2 focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <!-- Course Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Course Description</label>
                    <textarea name="description" id="description" rows="4" required
                        class="mt-1 block w-full rounded-md border border-gray-400 p-2 focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                </div>

                <!-- Content Type -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Content Type</label>
                    <div class="mt-2 space-x-4" name="type">
                        <label class="inline-flex items-center">
                            <input type="radio" name="content_type" value="video" class="form-radio text-indigo-600 border-2 border-gray-400">
                            <span class="ml-2">Video</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="content_type" value="document" class="form-radio text-indigo-600 border-2 border-gray-400">
                            <span class="ml-2">Document</span>
                        </label>
                    </div>
                </div>

                <!-- Course Category -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <select id="category" name="category" required
                        class="mt-1 block w-full rounded-md border border-gray-400 p-2 focus:border-indigo-500 focus:ring-indigo-500 bg-white">
                        <option value="1">PHP</option>
                    </select>
                </div>
                <div>
                    <label for="cdn" class="block text-sm font-medium text-gray-700">Link</label>
                    <input type="text" id="cdn" name="cdn"
                        class="mt-1 block w-full rounded-md border border-gray-400 p-2 focus:border-indigo-500 focus:ring-indigo-500" />

                </div>

                <!-- Course Tags -->
                <!-- <div>
                    <label for="tags" class="block text-sm font-medium text-gray-700">Tags (comma-separated)</label>
                    <input type="text" name="tags" id="tags" placeholder="e.g., JavaScript, React, Web Development"
                        class="mt-1 block w-full rounded-md border border-gray-400 p-2 focus:border-indigo-500 focus:ring-indigo-500">
                </div> -->

                <!-- Course Thumbnail -->
                <!-- <div>
                    <label class="block text-sm font-medium text-gray-700">Course Thumbnail</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-400 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="thumbnail" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="thumbnail" name="thumbnail" type="file" class="sr-only" accept="image/*">
                                </label>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF</p>
                        </div>
                    </div>
                </div> -->
            </div>

            <!-- Form Actions -->
            <div class="mt-8 flex justify-end space-x-4">
                <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-400 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Cancel
                </button>
                <button name="create" type="submit" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Create Course
                </button>
            </div>
        </form>
    </main>
    <pre>
    <?php var_dump($_GET); ?></pre>
</body>
</html>