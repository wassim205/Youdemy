<?php
require_once __DIR__ . '/../config/db.php';
class Teacher extends Db
{

    public function __construct()
    {
        parent::__construct();
    }

    public function countStudents(){
        $user_id = $_SESSION['user_loged_in_id'];
        $query = "SELECT COUNT(DISTINCT enrollments.student_id) FROM enrollments INNER JOIN courses ON enrollments.course_id = courses.id WHERE courses.teacher_id = $user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        return $result;
    }
    public function countStudentsForEachCourse($courseId)
    {
        $query = "SELECT COUNT(enrollments.student_id) 
                  FROM enrollments 
                  WHERE enrollments.course_id = :course_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':course_id', $courseId);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        return $result;
    }

    public function activeCourses(){
        $user_id = $_SESSION['user_loged_in_id'];
        $query = "SELECT COUNT(*) FROM enrollments INNER JOIN courses ON enrollments.course_id = courses.id WHERE courses.teacher_id = $user_id AND enrollment_date >= CURDATE() - INTERVAL 3 DAY";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        return $result;
    }
    public function countEngagements(){
        $user_id = $_SESSION['user_loged_in_id'];
        $query = "SELECT COUNT(*) FROM enrollments INNER JOIN courses ON enrollments.course_id = courses.id WHERE courses.teacher_id = $user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        return $result;
    }

    public function getEnrolleStatus($teacherId)
{
    $query = "SELECT users.username, users.id, users.first_name, users.last_name , enrollments.status, courses.title, courses.id 
    as course_id
    FROM users 
    LEFT JOIN enrollments ON users.id = enrollments.student_id
    LEFT JOIN courses ON enrollments.course_id = courses.id
    WHERE courses.teacher_id = :teacher_id AND users.role != 'admin' AND users.role != 'teacher'";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':teacher_id', $teacherId);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

public function updateStatus($studentId, $courseId)
{
    $query = "UPDATE enrollments 
              SET enrollments.status = 'enrolled' 
              WHERE enrollments.student_id = :student_id AND enrollments.course_id = :course_id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':student_id', $studentId);
    $stmt->bindParam(':course_id', $courseId);
    $stmt->execute();
}

   

}
