<?php
declare(strict_types = 1);

class RegisterController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {

/*        function filterData($data){
            $data = filter_var($data);
            $data = filter_input(INPUT_POST, $data);
            $data = htmlentities($data, ENT_COMPAT | ENT_HTML401);
            return $data;
        }*/


        session_start();
        $connection = new Connection();
        $fNameError = $lNameError = $emailError = $regPassError = $confPassError = $matchError = "";
        $fName = $lName = $email = $password = $confPassword = $passCheck = "";

//Create session variables if they don't exist
        if (!isset($_SESSION['first_name'])) {
            $_SESSION['first_name'] = "";
        }

        if (!isset($_SESSION['last_name'])) {
            $_SESSION['last_name'] = "";
        }

        if (!isset($_SESSION['email'])) {
            $_SESSION['email'] = "";
        }

//When button is clicked, form data sent to database
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //Session variables take data from post variables.
            $_SESSION['first_name'] = $_POST["first_name"];
            $_SESSION['last_name'] = $_POST["last_name"];
            $_SESSION['email'] = $_POST["email"];

            //Error handling fields required
            if (empty($_POST["first_name"])) {
                $fNameError = "* First name required!";
            } else {
                $fName = $_POST["first_name"];
            }

            if (empty($_POST["last_name"])) {
                $lNameError = "* Last name required!";
            } else {
                $lName = $_POST["last_name"];
            }

            if (empty($_POST["email"])) {
                $emailError = "* email required";

            } else {
                $email = $_POST['email'];
                if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                    $emailError = "* Invalid email";
                }
            }

            if (empty($_POST["register_password"])) {
                $regPassError = "* Password required";
            } else {
                $password = password_hash($_POST["register_password"], PASSWORD_DEFAULT);
            }

            if (empty($_POST["confirm_password"])) {
                $confPassError = "* You forgot to confirm your password";
            } else {
                $confPassword = $_POST["confirm_password"];
            }


//If errors are empty -> Put new student in database
            if (empty($fNameError) && empty($lNameError) && empty($emailError) && empty($regPassError) && empty($confPassError) && password_verify($confPassword, $password) == TRUE){
                $students = new Student($fName, $lName, $email, $password);
                $connection->insertStudent($students);
            } elseif (password_verify($confPassword, $password) == FALSE){
                $matchError = "The passwords don't match";
            }
        }
        require 'View/register.php';
    }
}