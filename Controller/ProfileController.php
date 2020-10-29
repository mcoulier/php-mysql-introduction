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

//Check if there was an action, then register which of buttons was clicked
        if (isset($_POST['action'])){
           if ($_POST['action'] == "edit"){
            $fName = $_POST["first_name"];
            $lName = $_POST["last_name"];
            $email = $_POST["email"];

            $updateStudents = $connection->updateStudent($fName, $lName, $email, $password, intval($GET['user']));

        } elseif ($_POST['action'] == "delete"){
            $deleteStudent = $connection->deleteStudent(intval($GET['user']));
            }
        }




        require 'View/profile.php';
    }
}