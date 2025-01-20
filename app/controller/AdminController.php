<?php
require_once __DIR__ . '/../model/Admin.php';
class AdminController extends BaseController{


    protected $AdminModel;
    public function __construct()
    {

        $this->AdminModel = new Admin();
    }
    public function handleAdmin(){

        if(isset($_POST['addCategory'])){
            $category = $_POST['new-cat'];
            $this->AdminModel->addCategory($category);
        }
        if(isset($_POST['addTag'])){
            $tag = $_POST['new-tag'];
            $this->AdminModel->addTag($tag);
        }

        $users = $this->AdminModel->getStudents();
        $teachers = $this->AdminModel->getTeachers();
        $courses = $this->AdminModel->getAllCourses();
        $categories = $this->AdminModel->getCategories();
        $tags = $this->AdminModel->getTags();
        
        $this->renderStudent('/Admin', ['users' => $users, 'teachers' => $teachers, 'courses' => $courses, 'categories' => $categories, 'tags' => $tags]);
    }

    public function deleteCategory(){
        $CategoryId = $_GET['CategoryId'];
        $this->AdminModel->deleteCategory($CategoryId);
        header('Location: /Youdemy/Admin');
    }
    public function deleteTag(){
        $TagId = $_GET['TagId'];
        $this->AdminModel->deleteTag($TagId);
        header('Location: /Youdemy/Admin');
    }
    public function deleteTeacher(){
        $TeacherId = $_GET['TeacherId'];
        $this->AdminModel->deleteTeacher($TeacherId);
        header('Location: /Youdemy/Admin');
    }
    public function deleteStudent(){
        $StudentId = $_GET['StudentId'];
        $this->AdminModel->deleteStudent($StudentId);
        header('Location: /Youdemy/Admin');
    }
    


}
