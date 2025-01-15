<?php
session_start();



require_once ('../core/BaseController.php');
require_once '../core/Router.php';
require_once '../core/Route.php';
require_once '../app/controller/AuthController.php';
require_once '../app/controller/UsersController.php';


$router = new Router();
Route::setRouter($router);


Route::get("/signup", [AuthController::class, "displaySignupPage"]);
Route::post("/signup", [AuthController::class, "signup"]);
Route::get("/login", [AuthController::class, "login"]);
Route::get("/Youdemy/Student", [AuthController::class, "student"]);


// Dispatch the request
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);


