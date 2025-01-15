<?php
require_once __DIR__ . '/../config/db.php';
class Course extends Db
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getcourses(){
        $query = "SELECT * FROM courses";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $course = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $course;
    }


}
