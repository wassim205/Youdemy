

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Login/Signup</title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <!-- Card Container -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <!-- Logo Section -->
            <div class="p-6 bg-indigo-600 text-white text-center">
                <div class="flex justify-center items-center space-x-2">
                    <i class="fas fa-book text-3xl"></i>
                    <h1 class="text-2xl font-bold">Youdemy</h1>
                </div>
                <p class="mt-2 text-indigo-200">Your Gateway to Knowledge</p>
            </div>

            <!-- Login Form -->
            <div id="loginForm" class="p-6">
                <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">Welcome Back!</h2>
                <form class="space-y-4" method="post">
                    <div>
                        <?php if (isset($error)) : ?>
                            <p class="text-red-500 text-center"><?= $error ?></p>
                            <?php endif; ?>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <div class="relative">
                            <input type="email" name="email"
                                class="w-full pl-10 pr-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                placeholder="Enter your email">
                            <i
                                class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <div class="relative">
                            <input type="password" name="password"
                                class="w-full pl-10 pr-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                placeholder="Enter your password">
                            <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>
                    <button type="submit" name="login"
                        class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition-colors flex items-center justify-center space-x-2">
                        <span>Login</span>
                        <i class="fas fa-arrow-right text-sm"></i>
                    </button>
                </form>
                <div class="flex justify-evenly">
                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-600">
                            Don't have an account?
                            <a href="signup"
                                class="ml-1 text-indigo-600 hover:text-indigo-800 font-medium flex items-center justify-center space-x-1 mx-auto mt-1">
                                <span>Sign Up</span>
                                <i class="fas fa-chevron-right text-sm"></i>
                            </a>
                        </p>
                    </div>
                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-600">
                            Visite Us As Guest
                            <a href="/"
                                class="ml-1 text-indigo-600 hover:text-indigo-800 font-medium flex items-center justify-center space-x-1 mx-auto mt-1">
                                <span>Enter As A Guest</span>
                                <i class="fas fa-chevron-right text-sm"></i>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>