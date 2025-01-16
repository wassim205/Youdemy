
<?php
require_once __DIR__ . '/../model/User.php';
class TeacherController extends BaseController
{


    protected $TeacherModel;
    public function __construct()
    {

        $this->TeacherModel = new User();
    }

    public function teacher()
    {

        $this->render('userPages/Teacher');
    }
}
?>