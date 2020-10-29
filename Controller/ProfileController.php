<?php
declare(strict_types = 1);

class ProfileController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        session_start();
        $connection = new Connection();
        $showProfileStudents = $connection->profileStudent();
/*
        if (!isset($_SESSION['first_name'])) {
            $_SESSION['first_name'] = "";
        }

        if (!isset($_SESSION['last_name'])) {
            $_SESSION['last_name'] = "";
        }

        if (!isset($_SESSION['email'])) {
            $_SESSION['email'] = "";
        }*/

        $fName = $lName = $email = $password = "";


        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $fName = $_POST["first_name"];
            $lName = $_POST["last_name"];
            $email = $_POST["email"];

            $updateStudents = $connection->updateStudent($fName, $lName, $email, $password, intval($GET['user']));

        }



        require 'View/profile.php';
    }
}