<?php
require_once __DIR__ . '/../model/User.php';
require_once __DIR__ . '/../model/Courses.php';
class UserController extends BaseController{


    protected $UserModel;
    protected $CourseModel;
    public function __construct()
    {

        $this->UserModel = new User();
        $this->CourseModel = new Course();
    }
    
    public function showMyCourses()
{
    $courses = $this->CourseModel->getMyCourses();
    $this->render('userPages/MyCourses', ['courses' => $courses]);
}



}
