<?php
session_start();



require_once ('../core/BaseController.php');
require_once '../core/Router.php';
require_once '../core/Route.php';
require_once '../app/controller/AuthController.php';
require_once '../app/controller/UsersController.php';
require_once '../app/controller/CoursesController.php';
require_once '../app/controller/TeacherController.php';
require_once '../app/controller/EnrollmentController.php';
require_once '../app/controller/AdminController.php';


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
Route::get("/Youdemy/Teacher/DeleteCourse?{id}", [CoursesController::class, "deleteCourse"]);
Route::get("/Youdemy/Teacher/statistics", [TeacherController::class, "statistics"]);
Route::get("/Youdemy/Teacher/StudentManagement", [TeacherController::class, "studentManagement"]);
Route::get("/Youdemy/Teacher/update-status?{student_id}?{course_id}", [TeacherController::class, "updateStatus"]);
Route::get("/Enroll", [EnrollmentController::class, "Enrolling"]);
Route::get("/Youdemy/Student/CourseDetails?{course_id}", [CoursesController::class, "coursDetails"]);


Route::get("/Youdemy/Admin", [AdminController::class, "handleAdmin"]);
Route::post("/Youdemy/Admin", [AdminController::class, "handleAdmin"]);
Route::get("/Youdemy/Admin/Delete?{CategoryId}", [AdminController::class, "deleteCategory"]);
Route::get("/Youdemy/Admin/Delete?{TagId}", [AdminController::class, "deleteTag"]);
Route::get("/Youdemy/Admin/Delete?{TeacherId}", [AdminController::class, "deleteTeacher"]);
Route::get("/Youdemy/Admin/Delete?{StudentId}", [AdminController::class, "deleteStudent"]);




// Dispatch the request
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);


