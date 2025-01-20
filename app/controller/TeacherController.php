
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


    public function teacher()
    {

        if (!isset($_SESSION['user_loged_in_id'])) {
            header('Location: /');
            exit;
        }

        $displayMyCourses = $this->CoursesModel->teacherCourses();
        $studentsEnrolled = $this->TeacherModel->countStudents();
        $activeCourses = $this->TeacherModel->activeCourses();
        $totalEngagements = $this->TeacherModel->countEngagements();
        $this->render('userPages/Teacher', ['studentsEnrolled' => $studentsEnrolled, 'activeCourses' => $activeCourses, 'totalEngagements' => $totalEngagements, 'displayMyCourses' => $displayMyCourses]);
    }

    public function AddingCourse()
    {
        if (!isset($_SESSION['user_loged_in_id'])) {
            header('Location: /');
            exit;
        }
        $this->render('userPages/AddingCourseForm');
    }
    public function statistics()
    {
        $displayMyCourses = $this->CoursesModel->teacherCourses();
        $studentsEnrolled = $this->TeacherModel->countStudents();
        $activeCourses = $this->TeacherModel->activeCourses();
        $totalEngagements = $this->TeacherModel->countEngagements();
        $enrolledStudentsForCourses = [];

        foreach ($displayMyCourses as $course) {
            $enrolledStudentsForCourses[$course['id']] = $this->TeacherModel->countStudentsForEachCourse($course['id']);
        }

        $this->render('userPages/statistics', [
            'studentsEnrolled' => $studentsEnrolled,
            'activeCourses' => $activeCourses,
            'totalEngagements' => $totalEngagements,
            'displayMyCourses' => $displayMyCourses,
            'enrolledStudentsForCourses' => $enrolledStudentsForCourses
        ]);
    }

    public function StudentManagement()
    {
        $teacherId = $_SESSION['user_loged_in_id'];
        $studentsEnrolled = $this->TeacherModel->countStudents();
        $activeCourses = $this->TeacherModel->activeCourses();
        $totalEngagements = $this->TeacherModel->countEngagements();
        $enrolleStatus = $this->TeacherModel->getEnrolleStatus($teacherId);

        $this->render('userPages/StudentManagement', ['studentsEnrolled' => $studentsEnrolled, 'activeCourses' => $activeCourses, 'totalEngagements' => $totalEngagements, 'enrolleStatus' => $enrolleStatus]);
    }

    public function updateStatus()
{
    $studentId = $_GET['student_id'];
    $courseId = $_GET['course_id'];
    $this->TeacherModel->updateStatus($studentId, $courseId);
    header('Location: /Youdemy/Teacher/StudentManagement');
}
}
?>