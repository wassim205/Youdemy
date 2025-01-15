<?php
require_once __DIR__ . '/../model/User.php';
class UserController extends BaseController{


    protected $UserModel;
    public function __construct()
    {

        $this->UserModel = new User();
    }
    public function showMyCourses(){
        
        $this->render('userPages/MyCourses');
    }




}
