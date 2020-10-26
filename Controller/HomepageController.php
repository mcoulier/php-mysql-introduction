<?php
declare(strict_types = 1);

class HomepageController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {

        function filterData($data){
            $data = filter_var($data);
            $data = filter_input(INPUT_POST, $data);
            $data = htmlentities($data);
            return $data;
        }

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

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //Session variables take data from post variables.
            $_SESSION['first_name'] = $_POST["first_name"];
            $_SESSION['last_name'] = $_POST["last_name"];
            $_SESSION['email'] = $_POST["email"];

            //Error handling fields required
            if (empty($_POST["first_name"])) {
                $firstName = "";
            } else {
                $firstName = filterData($_POST["first_name"]);
            }

            if (empty($_POST["last_name"])) {
                $lastName = "";
            } else {
                $lastName = filterData($_POST["last_name"]);
            }

            if (empty($_POST["email"])) {
                $email = "";
            } else {
                $email = filterData($_POST['email']);
                if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email";
                }
            }

        }

        require 'View/homepage.php';
    }
}