<?php
require_once __DIR__ . '/../model/Courses.php';
require_once __DIR__ . '/../model/DocumentContent.php';
require_once __DIR__ . '/../model/VideoContent.php';
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

    public function paginateCourses($limit = 3, $page = 1)
    {
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

    public function searchCoursesAjax()
    {
        $query = $_GET['query'];
        $courses = $this->CourseModel->searchCourses($query, 100, 0); // Fetch matching courses

        $response = [
            'courses' => $courses,
            'user_role' => isset($_SESSION["user_loged_in_role"]) ? $_SESSION["user_loged_in_role"] : null,
        ];

        echo json_encode($response);
        exit;
    }


    public function createCourse()
    {
        if (!isset($_SESSION['user_loged_in_id'])) {
            header('Location: /login');
            exit;
        }

        if (isset($_POST['create'])) {

            $type = $_POST['content_type'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $category = $_POST['category'];
            $cdn = $_POST['cdn'];
            $duration = 0;
            $fileSize =  0;

            $courseId = $this->CourseModel->create(
                $title,
                $description,
                $_SESSION['user_loged_in_id'],
                $category
            );

            if ($type === 'video') {
                $video = new VideoContent($courseId, $cdn, $duration);
                $video->save();
            } elseif ($type === 'document') {
                $document = new DocumentContent($courseId, $cdn, $fileSize);
                $document->save();
            }

            header('Location: /Youdemy/Teacher');
            exit;
        }
    }

    public function deleteCourse(){
        $id = $_GET['id'];
        $this->CourseModel->deleteCourse($id);
        header('Location: /Youdemy/Teacher');
        exit;
    }
}
