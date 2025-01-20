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
        $query = "SELECT 
        courses.*,
        categories.name AS category_name,
        GROUP_CONCAT(tags.name) AS tags
    FROM courses
    LEFT JOIN categories ON courses.category_id = categories.id
    LEFT JOIN course_tags ON courses.id = course_tags.course_id
    LEFT JOIN tags ON course_tags.tag_id = tags.id
    WHERE teacher_id = ?
    GROUP BY courses.id";

        $stmt = $this->conn->prepare($query);
        $stmt->execute([$_SESSION['user_loged_in_id']]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function deleteCourse($id)
    {
        $query = "DELETE FROM courses WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function create($title, $description, $teacherId, $categoryId)
    {
        $sql = "INSERT INTO courses (title, description, teacher_id, category_id) VALUES (?, ?, ?, ?)";
        $params = [
            $title,
            $description,
            $teacherId,
            $categoryId
        ];
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $this->conn->lastInsertId();
    }
}
