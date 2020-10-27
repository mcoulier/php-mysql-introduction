<?php
declare(strict_types = 1);

class HomepageController
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

        $fNameError = $lNameError = $emailError = "";
        $fName = $lName = $email = "";

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
//If errors are empty -> Put new student in database
            if (empty($fNameError) && empty($lNameError) && empty($emailError)){
                $students = new Student($fName, $lName, $email);
                $connection = new Connection();
                $connection->insertStudent($students);
            }
        }
        require 'View/homepage.php';
    }
}