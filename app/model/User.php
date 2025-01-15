<?php
require_once __DIR__ . '/../config/db.php';
class User extends Db
{

    public function __construct()
    {
        parent::__construct();
    }



    public function signup($userData)
    {
        try {
            $result = $this->conn->prepare("INSERT INTO users(username, first_name, last_name, email, password, role) VALUE (?, ?, ?, ?, ?, ?)");
            $final_result = $result->execute([$userData["username"], $userData["firstname"], $userData["lastname"], $userData["email"], $userData["password"], $userData["role"]]);
            return $final_result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }



    public function login($userData)
    {

        try {
            $result = $this->conn->prepare("SELECT * FROM users WHERE email=?");
            $result->execute([$userData["email"]]);
            $user = $result->fetch(PDO::FETCH_ASSOC);

            if ($user && $user["password"]) {
                return  $user;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
