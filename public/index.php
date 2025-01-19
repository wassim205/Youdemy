<?php
session_start();



require_once ('../core/BaseController.php');
require_once '../core/Router.php';
require_once '../core/Route.php';
require_once '../app/controller/AuthController.php';
require_once '../app/controller/UsersController.php';
require_once '../app/controller/CoursesController.php';
require_once '../app/controller/TeacherController.php';


$router = new Router();
Route::setRouter($router);


Route::get("/signup", [AuthController::class, "displaySignupPage"]);
Route::post("/signup", [AuthController::class, "signup"]);
Route::get("/login?{error}", [AuthController::class, "login"]);
Route::post("/login", [AuthController::class, "handleLogin"]);
Route::get("/", [AuthController::class, "index"]);
Route::get("/", [CoursesController::class, "showAllCourses"]);
Route::get("/logout", [AuthController::class, "logout"]);
Route::get("/Youdemy/Student/MyCourses", [UserController::class, "showMyCourses"]);

Route::get("/Youdemy/Student?{page}", [AuthController::class, "index"]);
Route::get("/Youdemy/Student?{page}", [CoursesController::class, "showAllCourses"]);
Route::get("/search-ajax", [CoursesController::class, "searchCoursesAjax"]);
Route::get("/Youdemy/Teacher", [TeacherController::class, "teacher"]);
Route::get("/AddCourse", [TeacherController::class, "AddingCourse"]);
Route::post("/Youdemy/Teacher", [CoursesController::class, "createCourse"]);
// Dispatch the request
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);


