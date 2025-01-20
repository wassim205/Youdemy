<?php
require_once __DIR__ . '/../config/db.php';
class Admin extends Db
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getStudents()
    {
        $query = "SELECT * FROM users WHERE role = 'student'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getTeachers()
    {
        $query = "SELECT users.*, COUNT(courses.id) AS course_num 
              FROM users 
              LEFT JOIN courses ON users.id = courses.teacher_id 
              WHERE users.role = 'teacher' 
              GROUP BY users.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllCourses()
    {
        $query = "
        SELECT 
            courses.title,
            courses.description,
            users.first_name,
            users.last_name,
            categories.name AS category_name,
            courses.created_at,
            courses.id AS courseID,
            COUNT(enrollments.student_id) AS enrolled_students
        FROM 
            courses
        JOIN 
            users ON users.id = courses.teacher_id
        LEFT JOIN 
            categories ON categories.id = courses.category_id
        LEFT JOIN 
            enrollments ON enrollments.course_id = courses.id
        GROUP BY 
            courses.id
    ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getCategories()
    {
        $query = "SELECT * FROM categories";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTags()
    {
        $query = "SELECT * FROM tags";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function AddCategory($category)
    {
        $query = "INSERT INTO categories (name) VALUES (:category)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }
    public function addTag($tag)
    {
        $query = "INSERT INTO tags (name) VALUES (:tag)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':tag', $tag, PDO::PARAM_STR);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }
    public function DeleteCategory($categoryId)
    {
        $query = "DELETE FROM categories WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }
    public function deleteTag($TagId)
    {
        $query = "DELETE FROM tags WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $TagId, PDO::PARAM_INT);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }
    public function deleteTeacher($TeacherId)
    {
        $query = "DELETE FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $TeacherId, PDO::PARAM_INT);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }
    public function deleteStudent($studentId)
    {
        $query = "DELETE FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $studentId, PDO::PARAM_INT);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }
}
