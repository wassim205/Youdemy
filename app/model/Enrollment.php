<?php
require_once __DIR__ . '/../config/db.php';
class Enrollment extends Db
{

    public function __construct()
    {
        parent::__construct();
    }

    public function Enroll($courseId){
        $id = $_SESSION['user_loged_in_id'];
        $query = "INSERT INTO enrollments (student_id, course_id, status) VALUES($id, $courseId, 'pending')";
        $result = $this->conn->prepare($query);
        $result->execute();
    }

    public function getEnrollmentStatus($courseId, $userId)
{
    $query = "SELECT status FROM enrollments WHERE course_id = :course_id AND student_id = :student_id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':course_id', $courseId);
    $stmt->bindParam(':student_id', $userId);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
}
