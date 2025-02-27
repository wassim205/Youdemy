<?php
require_once __DIR__ . '/../model/User.php';
class AuthController extends BaseController
{

    protected $UserModel;
    public function __construct()
    {

        $this->UserModel = new User();
    }

    public function displaySignupPage()
    {
        $this->render('authentification/signup');
    }
    public function signup()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['signup'])) {
                $username = $_POST['username'];
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $role = $_POST['role'];
                $userData = ["username" => $username, "firstname" => $firstname, "lastname" => $lastname, "email" => $email, "password" => $password, "role" => $role];
                $user = $this->UserModel->signup($userData);

                if ($user) {
                    $_SESSION['user_loged_in_role'] = $role;
                    $_SESSION['user_loged_in_name'] = $username;
                    if ($user && $role == 'student') {
                        header('Location: /');
                    } elseif ($user && $role == 'teacher') {
                        header('Location: /Youdemy/Teacher');
                    }
                } else {
                    $this->render('login', ['error' => 'Invalid email or password']);
                }
            }
        }
    }
    public function login()
    {

        $error = isset($_GET['error']) ? $_GET['error'] : null;
        $this->render('authentification/login', ['error' => $error]);

    }

    public function handleLogin()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['login'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $userData = ["email" => $email, "password" => $password];


                $user = $this->UserModel->login($userData);

                if ($user) {
                    $role = $user['role'];
                    $_SESSION['user_loged_in_id'] = $user['id'];
                    $_SESSION['user_loged_in_role'] = $role;
                    $_SESSION['user_loged_in_name'] = $user['firstname'] . ' ' . $user['lastname'];
                    if ($user && $role == 'student') {
                        header('Location: /Youdemy/Student?page=1');
                    } elseif ($user && $role == 'teacher') {
                        header('Location: /Youdemy/Teacher');
                    } elseif ($user && $role == 'admin') {
                        header('Location: /Youdemy/Admin');
                    }
                } else {
                    $this->render('authentification/login', ['error' => 'Invalid email or password']);
                }
            }
        }
    }



    public function index()
    {
        
        $this->render('userPages/studentHome');
    }

    public function logout()
    {

        if (isset($_SESSION['user_loged_in_role'])) {
            session_unset();
            session_destroy();

            header("Location: /login");
            exit;
        }
    }
}
