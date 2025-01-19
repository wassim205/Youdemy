<?php 
require_once 'Content.php';
class VideoContent extends Content
{
    private $vidUrl;
    private $duration;

    public function __construct($courseId, $vidUrl, $duration)
    {
        parent::__construct($courseId);
        $this->vidUrl = $vidUrl;
        $this->duration = $duration;
    }

    public function save()
{
    $sql = "INSERT INTO contents (course_id, type) VALUES (:course_id, 'video')";
    $params = [
        ':course_id' => $this->courseId
    ];

    $stmt = $this->conn->prepare($sql);
    $stmt->execute($params);

    $contentId = $this->conn->lastInsertId();

    $sql = "INSERT INTO videocontent (content_id, video_url, video_duration) VALUES (:content_id, :video_url, :video_duration)";
    $params = [
        ':content_id' => $contentId,
        ':video_url' => $this->vidUrl,
        ':video_duration' => $this->duration
    ];

    $stmt = $this->conn->prepare($sql);
    $stmt->execute($params);

    return $contentId;
}

public function display($courseId)
{
    $sql = "SELECT title , DESCRIPTION , TYPE , video_url FROM courses
        INNER JOIN contents ON courses.id = contents.course_id
        INNER JOIN videocontent ON contents.id = videocontent.content_id
        WHERE courses.id = :course_id";

    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':course_id', $courseId);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
}