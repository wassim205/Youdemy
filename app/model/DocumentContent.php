<?php

require_once 'Content.php';
class DocumentContent extends Content
{
    private $path;
    private $fileSize;

    public function __construct($courseId, $path, $fileSize)
    {
        parent::__construct($courseId);
        $this->path = $path;
        $this->fileSize = $fileSize;
    }

    public function save()
{
    $sql = "INSERT INTO contents (course_id, type) VALUES (:course_id, 'document')";
    $params = [
        ':course_id' => $this->courseId
    ];

    $stmt = $this->conn->prepare($sql);
    $stmt->execute($params);

    $contentId = $this->conn->lastInsertId();

    $sql = "INSERT INTO documentcontent (content_id, file_path, file_size) VALUES (:content_id, :file_path, :file_size)";
    $params = [
        ':content_id' => $contentId,
        ':file_path' => $this->path,
        ':file_size' => $this->fileSize
    ];

    $stmt = $this->conn->prepare($sql);
    $stmt->execute($params);

    return $contentId;
}

public function display($courseId)
{
    $sql = "SELECT title , DESCRIPTION , TYPE , file_path FROM courses
    INNER JOIN contents ON courses.id = contents.course_id
    INNER JOIN documentcontent ON contents.id = documentcontent.content_id
    WHERE courses.id = :course_id";

    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':course_id', $courseId);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
}
