<?php
require_once __DIR__ . '/../config/db.php';
class Course extends Db
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getcourses($limit, $offset = 0)
    {
        $query = "SELECT * FROM courses LIMIT $limit OFFSET $offset";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $courses;
    }

    public function getTotalCourses()
    {
        $query = "SELECT COUNT(*) as total FROM courses";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function searchCourses($query, $limit, $offset)
    {
        $query = "%$query%";
        $stmt = $this->conn->prepare("SELECT * FROM courses WHERE title LIKE :query OR description LIKE :query LIMIT $limit OFFSET $offset");
        $stmt->bindParam(':query', $query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function teacherCourses()
    {
        $query = "SELECT * FROM courses WHERE teacher_id = :teacher_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':teacher_id',$_SESSION['user_loged_in_role']);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
