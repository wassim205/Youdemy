<?php
require_once __DIR__ . '/../model/Courses.php';
class CoursesController extends BaseController
{

    protected $id;
    protected $title;
    protected $description;
    protected $content;
    protected $type;
    protected $teacher_id;
    protected $category_id;
    protected $created_at;
    protected $updated_at;

    protected $CourseModel;
    public function __construct()
    {

        $this->CourseModel = new Course();
    }
    public function showAllCourses()
    {
        $courses = $this->CourseModel->getcourses();
        $this->renderStudent('studentHome', ['courses' => $courses]);
    }
}
