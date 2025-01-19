<?php
require_once __DIR__ . '/../config/db.php';
abstract class Content extends Db
{
    protected $id;
    protected $courseId;
    protected $createdAt;

    public function __construct($courseId)
    {
        parent::__construct();
        $this->courseId = $courseId;
        $this->createdAt = new DateTime();
    }


    abstract public function save();
    abstract public function display($courseId);
}


?>