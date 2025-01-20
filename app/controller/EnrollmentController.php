<?php
require_once __DIR__ . '/../model/Enrollment.php';
class EnrollmentController extends BaseController{


    protected $EnrollmentModel;
    public function __construct()
    {

        $this->EnrollmentModel = new Enrollment();
    }
    public function Enrolling(){
        $courseId = $_GET['course_id'];
        $this->EnrollmentModel->Enroll($courseId);
        header('Location: /Youdemy/Student?page=1');
    }




}
