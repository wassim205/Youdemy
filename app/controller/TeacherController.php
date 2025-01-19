
<?php
require_once __DIR__ . '/../model/Teacher.php';
require_once __DIR__ . '/../model/Courses.php';
class TeacherController extends BaseController
{

    protected $TeacherModel;
    protected $CoursesModel;
    public function __construct()
    {

        $this->TeacherModel = new Teacher();
        $this->CoursesModel = new Course();
    }
    
    public function teacher(){

        if (!isset($_SESSION['user_loged_in_id'])) {
            header('Location: /');
            exit;
        }

        $displayMyCourses = $this->CoursesModel->teacherCourses();
        $studentsEnrolled = $this->TeacherModel->countStudents();
        $activeCourses = $this->TeacherModel->activeCourses();
        $totalEngagements = $this->TeacherModel->countEngagements();
        $this->render('userPages/Teacher',['studentsEnrolled' => $studentsEnrolled , 'activeCourses' => $activeCourses, 'totalEngagements' => $totalEngagements, 'displayMyCourses' => $displayMyCourses]);
    }

    public function AddingCourse(){
        if (!isset($_SESSION['user_loged_in_id'])) {
            header('Location: /');
            exit;
            }
            $this->render('userPages/AddingCourseForm');
    }


}
?>