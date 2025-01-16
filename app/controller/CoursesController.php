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

    public function paginateCourses($limit = 3, $page = 1) {
        $offset = ($page - 1) * $limit;
        $courses = $this->CourseModel->getcourses($limit, $offset);
        $totalCourses = $this->CourseModel->getTotalCourses();
        $totalPages = ceil($totalCourses / $limit);
        return [
            'courses' => $courses,
            'totalPages' => $totalPages,
            'currentPage' => $page,
        ];
    }

    public function showAllCourses()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $paginationData = $this->paginateCourses(3, $page);
        $this->renderStudent('studentHome', ['courses' => $paginationData['courses'], 'paginationData' => $paginationData]);
    }
}
