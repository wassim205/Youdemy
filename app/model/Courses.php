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
        $query = "SELECT 
            courses.*,
            users.first_name, 
            users.last_name,
            categories.name AS category_name,
            GROUP_CONCAT(tags.name) AS tags,
            (SELECT enrollments.status FROM enrollments WHERE enrollments.course_id = courses.id AND enrollments.student_id = :student_id) AS enrollment_status
        FROM courses
        JOIN users ON courses.teacher_id = users.id
        LEFT JOIN categories ON courses.category_id = categories.id
        LEFT JOIN course_tags ON courses.id = course_tags.course_id
        LEFT JOIN tags ON course_tags.tag_id = tags.id
        GROUP BY courses.id
        LIMIT :limit OFFSET :offset";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':student_id', $_SESSION['user_loged_in_id']);
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

    public function getCourseDetails($courseId)
{
    $query = "SELECT 
        courses.id,
        courses.title,
        courses.description,
        courses.category_id,
        categories.name AS category_name,
        users.first_name,
        users.last_name,
        (SELECT COUNT(enrollments.student_id) FROM enrollments WHERE enrollments.course_id = courses.id) AS enrolled_students,
        (SELECT content_cdn FROM (
            SELECT documentContent.file_path AS content_cdn FROM documentContent JOIN contents ON documentContent.content_id = contents.id WHERE contents.course_id = courses.id
            UNION
            SELECT videoContent.video_url AS content_cdn FROM videoContent JOIN contents ON videoContent.content_id = contents.id WHERE contents.course_id = courses.id
        ) AS content) AS content_cdn
    FROM courses
    JOIN users ON courses.teacher_id = users.id
    JOIN categories ON courses.category_id = categories.id
    WHERE courses.id = :course_id";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':course_id', $courseId);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
}
